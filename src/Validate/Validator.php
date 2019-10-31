<?php

namespace mikevandiepen\utility\Validate;

use mikevandiepen\utility\Response;
use mikevandiepen\utility\Helpers\Translation;
use mikevandiepen\utility\Helpers\Configuration;

class Validator
{
    /**
     * Filename for the rules config
     */
    const RULES_CONFIG_FILE = 'rules';

    /**
     * Filename for the rules aliases config
     */
    const RULES_ALIASES_CONFIG_FILE = 'rules_aliases';

    /**
     * The config for the validation rules will be stored in here
     * @var array
     */
    private $rules = array();

    /**
     * The config for the validation rules aliases will be stored in here
     * @var array
     */
    private $rulesAliases = array();

    /**
     * Used for storing the validation setup for the given attribute
     * @var array
     */
    private $results = array();

    /**
     * The response class will be stored in here and used for error handling
     * @var Response
     */
    private $response;

    /**
     * The translation class will be stored in here and is used for getting the translations
     * @var Translation
     */
    private $translation;

    /**
     * The $_POST request / data which should be validated is stored in here
     * @var array
     */
    private $request = array();

    /**
     * The rules with the applied thresholds
     * @var array
     */
    private $config = array();

    /**
     * Language for the response messages
     * @var string
     */
    private $language = 'default';

    /**
     * Validator constructor.
     *
     * @param array  $request
     * @param array  $config
     * @param string $language
     */
    public function __construct(array $request, array $config = array(), string $language = 'default')
    {
        // Binding properties
        $this->request  = $request;
        $this->config   = $config;
        $this->language = $language;

        // Calling the configuration files
        $this->rules        = (new Configuration(self::RULES_CONFIG_FILE))->get();
        $this->rulesAliases = (new Configuration(self::RULES_ALIASES_CONFIG_FILE))->get();
    }

    /**
     * Validating all the values and applying all the assigned rules
     * @return Validator
     */
    public function validate() : self
    {
        // Instantiating the response and translation classes
        // $this->response     = new Response();
        $this->translation  = new Translation();

        foreach ($this->config as $field => $rules) {           // Parsing through all the fields
            foreach (explode('|', $rules) as $rule) {  // Parsing through the filters and applying them to each field

                // Extracting the parameters
                $configuration      = $this->getConfiguration($rule);
                $inputValues        = is_array($this->request[$field]) ? $this->request[$field] : array($this->request[$field]);
                $ruleConfiguration  = $this->getRuleConfiguration($configuration['rule']);

                // Creating the namespace dynamically
                $class = 'Rules\\' . $ruleConfiguration['category'] . '\\' . $ruleConfiguration['class'];

                var_dump($this->callValidationRule($class, $inputValues, $configuration['thresholds']));

                // Applying the validation rule by calling the filter dynamically
                $this->results['valid'][] = $this->callValidationRule($class, $inputValues, $configuration['thresholds']);

                // Creating a validation config for the current operation
                $this->results[] = [
                    'field'         => $field,
                    'rule'          => $configuration['rule'],
                    'values'        => $inputValues,
                    'thresholds'    => $configuration['thresholds'],
                ];
            }
        }

        // Parsing through the results and generating the response messages accordingly
        foreach ($this->results as $result) {
            if ($result['valid'] === false || $result['valid'] !== true) {

                $message    = $this->translation->get($result['rule'], $this->language);
                $attributes = $this->getAttributes(
                    $result['field'],
                    $result['values'],
                    $result['thresholds']
                );

                // Adding delimiters to the attributes
                $this->response->delimiters('<strong>', '</strong>');

                // The validation returned false; now the error message will be collected
                $this->response->add($message, $attributes, Response::ERROR);
            }
        }

        return $this;
    }

    /**
     * @param string $class
     * @param array  $value
     * @param array  $thresholds
     *
     * @return bool
     */
    private function callValidationRule(string $class, array $value, array $thresholds) : bool
    {
        try {
            // Transforming the dynamic namespace and class to an class which implements ValidationInterface
            $reflection = new \ReflectionClass($class);
            $reflection->implementsInterface('ValidationInterface');

            // Calling the validating rule
            return (boolean) (new Validation(
                new $reflection($value, $thresholds)
            ))->validate();

            // Something went wrong, this will be left unhandled
        } catch(\ReflectionException $e) {
            print_r($e->getMessage());
            return false;
        }
    }

    /**
     * Collects the rule by the alias
     * @param string $alias
     *
     * @return string
     */
    private function getRuleByAlias(string $alias) : string
    {
        return $this->rulesAliases[$alias];
    }

    /**
     * Collects the rule configuration by the identified rule
     * @param string $rule
     *
     * @return array
     */
    private function getRuleConfiguration(string $rule) : array
    {
        // Checking whether the rule is an alias
        if (in_array($rule, array_keys($this->rulesAliases)) || key_exists($rule, $this->rulesAliases)) {
            // Assigning the rule main name as $rule
            $rule = $this->getRuleByAlias($rule);
        }

        // Validating whether the rule exists
        if (key_exists($rule, $this->rules)) {
            return $this->rules[$rule];
        } else {
            return array();
        }
    }

    /**
     * Collecting the responses as JSON string
     * @return string
     */
    public function responseMessages() : string
    {
        return $this->response->toJSON();
    }

    /**
     * Whether the request passes the validation
     * @return bool
     */
    public function passesValidation() : bool
    {
        return count($this->response->toArray()) === 0 ? true: false;
    }

    /**
     * This method extracts the thresholds from the configuration
     * thresholds are all the values after an       ( : ).
     * Multiple thresholds are separated by comma   ( , ).
     * @param string $rule
     *
     * @return array
     */
    private function getConfiguration(string &$rule): array
    {
        $collection             = array('rule' => strtolower($rule));
        $regularExpressionRules = array('regex', 'expression', 'regular_expression');

        // Validating whether the rule contains a regular expression
        foreach ($regularExpressionRules as $regularExpressionRule) {
            if (strpos($rule, $regularExpressionRule) !== false) {

                // Checking if there are any patterns for this rule
                if (strpos($rule, ':')) {
                    preg_match('/(?<=\/)(.*?)(?=\/)/', $rule, $patterns);

                    // Parsing through the patterns and storing them inside the thresholds array.
                    foreach ($patterns as $pattern) {
                        $collection['thresholds'][] = (string) $pattern;
                    }
                }
            }
        }

        // Checking if there are thresholds for the rule
        if (strpos($rule, ':')) {
            preg_match('/:(.*)/', $rule, $thresholds);

            // Removing the first index
            unset($thresholds[0]);

            // Reindexing and defining field type
            foreach ($thresholds as $threshold) {
                if ($threshold)

                if (is_string($threshold)) {
                    $threshold = (string) $threshold;
                }
                if (filter_var($threshold, FILTER_VALIDATE_BOOLEAN)) {
                    $threshold = (boolean) $threshold;
                }
                if (filter_var($threshold, FILTER_VALIDATE_INT)) {
                    $threshold = (int) $threshold;
                }
                if (filter_var($threshold, FILTER_VALIDATE_BOOLEAN)) {
                    $threshold = (float) $threshold;
                }

                $collection['thresholds'][] = $threshold;
            }
        } else {
            $collection['thresholds'] = array();
        }

        return $collection;
    }

    /**
     * Parsing the attributes for this rule and storing them in a usable array
     * @param string $attribute
     * @param array  $values
     * @param array  $thresholds
     *
     * @return array
     */
    private function getAttributes(string &$attribute, array &$values, array &$thresholds = array()) : array
    {
        // All the attributes will be stored in here.
        $attributes = array();

        // Parsing through all the attributes and putting them into the $attributes[] array
        $attributes['attribute'] = $attribute;

        // Parsing through all the values and putting them into the $attributes[] array
        if (($valuesCount = count($values)) > 1) {
            for ($i = 0; $i < $valuesCount; $i++) {
                $attributes['value_' . $i] = $values[$i];
            }
            $attributes['value_list'] = implode(', ', $values);
        } else {
            $attributes['value'] = implode('', $values);
        }

        // Parsing through all the parameters and putting them into the $attributes[] array
        if (($thresholdsCount = count($thresholds)) > 1) {
            for ($i = 0; $i < $thresholdsCount; $i++) {
                $attributes['threshold_' . $i] = $thresholds[$i];
            }
            $attributes['threshold_list'] = implode(', ', $thresholds);
        } else {
            $attributes['threshold'] = implode('', $thresholds);
        }

        return $attributes;
    }
}
