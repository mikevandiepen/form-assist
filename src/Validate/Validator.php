<?php

namespace mikevandiepen\utility\Validate;

use mikevandiepen\utility\Response;
use mikevandiepen\utility\Translator\Translator;

class Validator
{
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
     * @var Translator
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
    private $language   = 'default';

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
    }

    /**
     * Validating all the values and applying all the assigned rules
     * @return Validator
     */
    public function validate() : self
    {
        $results = null;

        // Instantiating the response and translation classes
        $this->response     = new Response();
        $this->translation  = new Translator($this->language);

        foreach ($this->config as $field => $rules) {           // Parsing through all the fields
            foreach (explode('|', $rules) as $rule) {  // Parsing through the filters and applying them to each field

                // Extracting the parameters
                $configuration  = $this->getConfiguration($rule);
                $inputValues    = is_array($this->request[$field]) ? $this->request[$field] : array($this->request[$field]);

                // Transforming the string to lowercase to be more flexible to the end user
                switch (strtolower($configuration['rule'])) {

                    // Basic validation
                    case 'required':
                        $this->results['valid'][] = (boolean) (new Validation(
                            new Rules\Basic\Required($inputValues, $configuration['thresholds'])
                        ))->validate();
                        break;

                    // Type validation
                    case 'num':
                    case 'numeric':
                        $this->results['valid'][] = (boolean) (new Validation(
                            new Rules\Types\TypeNumeric($inputValues, $configuration['thresholds'])
                        ))->validate();
                        break;

                    case 'float':
                        $this->results['valid'][] = (boolean) (new Validation(
                            new Rules\Types\TypeFloat($inputValues, $configuration['thresholds'])
                        ))->validate();
                        break;

                    case 'bool':
                    case 'boolean':
                        $this->results['valid'][] = (boolean) (new Validation(
                            new Rules\Types\TypeBoolean($inputValues, $configuration['thresholds'])
                        ))->validate();
                        break;

                    case 'int':
                    case 'integer':
                        $this->results['valid'][] = (boolean) (new Validation(
                            new Rules\Types\TypeInteger($inputValues, $configuration['thresholds'])
                        ))->validate();
                        break;

                    case 'null':
                        $this->results['valid'][] = (boolean) (new Validation(
                            new Rules\Types\TypeNull($inputValues, $configuration['thresholds'])
                        ))->validate();
                        break;

                    case 'string':
                        $this->results['valid'][] = (boolean) (new Validation(
                            new Rules\Types\TypeString($inputValues, $configuration['thresholds'])
                        ))->validate();
                        break;

                    case 'array':
                        $this->results['valid'][] = (boolean) (new Validation(
                            new Rules\Types\TypeArray($inputValues, $configuration['thresholds'])
                        ))->validate();
                        break;

                    // Date validation
                    case 'before_date':
                        $this->results['valid'][] = (boolean) (new Validation(
                            new Rules\Date\Before($inputValues, $configuration['thresholds'])
                        ))->validate();
                        break;

                    case 'after_date':
                        $this->results['valid'][] = (boolean) (new Validation(
                            new Rules\Date\After($inputValues, $configuration['thresholds'])
                        ))->validate();
                        break;

                    case 'between_dates':
                        $this->results['valid'][] = (boolean) (new Validation(
                            new Rules\Date\Between($inputValues, $configuration['thresholds'])
                        ))->validate();
                        break;

                    // String validation
                    case 'starts_with':
                        $this->results['valid'][] = (boolean) (new Validation(
                            new Rules\String\StartsWith($inputValues, $configuration['thresholds'])
                        ))->validate();
                        break;

                    case 'ends_with':
                        $this->results['valid'][] = (boolean) (new Validation(
                            new Rules\String\EndsWith($inputValues, $configuration['thresholds'])
                        ))->validate();
                        break;

                    case 'contains':
                        $this->results['valid'][] = (boolean) (new Validation(
                            new Rules\String\Contains($inputValues, $configuration['thresholds'])
                        ))->validate();
                        break;

                    case 'regex':
                        $this->results['valid'][] = (boolean) (new Validation(
                            new Rules\String\Regex($inputValues, $configuration['thresholds'])
                        ))->validate();
                        break;

                    case 'exact_length':
                        $this->results['valid'][] = (boolean) (new Validation(
                            new Rules\String\ExactLength($inputValues, $configuration['thresholds'])
                        ))->validate();
                        break;

                    case 'minlen':
                    case 'min_length':
                        $this->results['valid'][] = (boolean) (new Validation(
                            new Rules\String\MinLength($inputValues, $configuration['thresholds'])
                        ))->validate();
                        break;

                    case 'maxlen':
                    case 'max_length':
                        $this->results['valid'][] = (boolean) (new Validation(
                            new Rules\String\MaxLength($inputValues, $configuration['thresholds'])
                        ))->validate();
                        break;

                    // String types
                    case 'email':
                        $this->results['valid'][] = (boolean) (new Validation(
                            new Rules\String\Email($inputValues, $configuration['thresholds'])
                        ))->validate();
                        break;

                    case 'url':
                        $this->results['valid'][] = (boolean) (new Validation(
                            new Rules\String\Url($inputValues, $configuration['thresholds'])
                        ))->validate();
                        break;

                    case 'domain':
                        $this->results['valid'][] = (boolean) (new Validation(
                            new Rules\String\Domain($inputValues, $configuration['thresholds'])
                        ))->validate();
                        break;

                    case 'ip':
                    case 'ip_address':
                        $this->results['valid'][] = (boolean) (new Validation(
                            new Rules\String\IpAddress($inputValues, $configuration['thresholds'])
                        ))->validate();
                        break;

                    case 'mac':
                    case 'mac_address':
                        $this->results['valid'][] = (boolean) (new Validation(
                            new Rules\String\MacAddress($inputValues, $configuration['thresholds'])
                        ))->validate();
                        break;

                    // Numeric validation
                    case 'between':
                        $this->results['valid'][] = (boolean) (new Validation(
                            new Rules\Numeric\Between($inputValues, $configuration['thresholds'])
                        ))->validate();
                        break;

                    case 'min':
                    case 'minimum':
                        $this->results['valid'][] = (boolean) (new Validation(
                            new Rules\Numeric\Min($inputValues, $configuration['thresholds'])
                        ))->validate();
                        break;

                    case 'max':
                    case 'maximum':
                        $this->results['valid'][] = (boolean) (new Validation(
                            new Rules\Numeric\Max($inputValues, $configuration['thresholds'])
                        ))->validate();
                        break;

                    case 'equal':
                    case 'equals':
                    case 'equal_to':
                    case 'equals_to':
                        $this->results['valid'][] = (boolean) (new Validation(
                            new Rules\Numeric\Equal($inputValues, $configuration['thresholds'])
                        ))->validate();
                        break;

                    case 'not_equal':
                    case 'not_equal_to':
                        $this->results['valid'][] = (boolean) (new Validation(
                            new Rules\Numeric\NotEqual($inputValues, $configuration['thresholds'])
                        ))->validate();
                        break;

                    case 'gt':
                    case 'greater_than':
                        $this->results['valid'][] = (boolean) (new Validation(
                            new Rules\Numeric\GreaterThan($inputValues, $configuration['thresholds'])
                        ))->validate();
                        break;

                    case 'gte':
                    case 'greater_than_or_equal_to':
                        $this->results['valid'][] = (boolean) (new Validation(
                            new Rules\Numeric\GreaterThanOrEqualTo($inputValues, $configuration['thresholds'])
                        ))->validate();
                        break;

                    case 'lt':
                    case 'less_than':
                        $this->results['valid'][] = (boolean) (new Validation(
                            new Rules\Numeric\LessThan($inputValues, $configuration['thresholds'])
                        ))->validate();
                        break;

                    case 'lte':
                    case 'less_than_or_equal_to':
                        $this->results['valid'][] = (boolean) (new Validation(
                            new Rules\Numeric\LessThanOrEqualTo($inputValues, $configuration['thresholds'])
                        ))->validate();
                        break;

                    // File validation
                    case 'allowed_extensions':
                        $this->results['valid'][] = (boolean) (new Validation(
                            new  Rules\File\AllowedExtensions($inputValues, $configuration['thresholds'])
                        ))->validate();
                        break;

                    case 'allowed_mime_types':
                        $this->results['valid'][] = (boolean) (new Validation(
                            new  Rules\File\AllowedMimeTypes($inputValues, $configuration['thresholds'])
                        ))->validate();
                        break;

                    case 'max_size':
                    case 'max_file_size':
                        $this->results['valid'][] = (boolean) (new Validation(
                            new  Rules\File\MaxFileSize($inputValues, $configuration['thresholds'])
                        ))->validate();
                        break;

                    // Email validation
                    case 'allowed_providers':
                    case 'allowed_email_providers':
                        $this->results['valid'][] = (boolean) (new Validation(
                            new  Rules\Email\AllowedProviders($inputValues, $configuration['thresholds'])
                        ))->validate();
                        break;

                    case 'blocked_providers':
                    case 'blocked_email_providers':
                        $this->results['valid'][] = (boolean) (new Validation(
                            new  Rules\Email\BlockedProviders($inputValues, $configuration['thresholds'])
                        ))->validate();
                        break;

                    //--------------------------------------------------------------------------------------------------
                    // More validation rules can be added here
                    //--------------------------------------------------------------------------------------------------
                    //
                    //  EXAMPLE:
                    //
                    //  case 'rule':
                    //      $this->results['valid'][] = (boolean) (new Validation(
                    //          new Rules\RuleType\RuleName($inputValues, $configuration['thresholds']))
                    //      )->validate();
                    //  break;
                    //
                    //--------------------------------------------------------------------------------------------------
                }

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

                $message    = $this->translation->get($result['rule']);
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
        $collection = array();
        $collection['rule'] = strtolower($rule);

        // Checking if there are thresholds for the rule
        if (strpos($rule, ':')) {
            preg_match('/:(.*)/', $rule, $thresholds);

            // Removing the first index
            unset($thresholds[0]);

            // Reindexing and defining field type
            foreach ($thresholds as $threshold) {
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
            $attributes['value'] = is_array($values) ? implode('', $values) : $values;
        }

        // Parsing through all the parameters and putting them into the $attributes[] array
        if (($thresholdsCount = count($thresholds)) > 1) {
            for ($i = 0; $i < $thresholdsCount; $i++) {
                $attributes['threshold_' . $i] = $thresholds[$i];
            }
            $attributes['threshold_list'] = implode(', ', $thresholds);
        } else {
            $attributes['threshold'] = is_array($thresholds) ? implode('', $thresholds) : $thresholds;
        }

        return $attributes;
    }
}
