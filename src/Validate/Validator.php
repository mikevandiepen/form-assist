<?php

namespace mikevandiepen\utility\Validate;

class Validator
{
    /**
     * All cleaned output will be stored in here
     * @var array
     */
    private static $output = [];

    /**
     * Validating all the values and applying all the assigned rules
     * @param array $request
     * @param array $config
     * @return array
     */
    public function validate(array $request, array $config = array()): array
    {
        // Parsing through all the fields
        foreach ($config as $field => $rules) {

            // Parsing through the filters and applying them to each field
            foreach (explode('|', $rules) as $rule) {

                // Extracting the parameters
                $configuration = $this->extractParameters($rule);

                switch ($configuration['rule']) {

                    // Date validation
                    case 'before_date':
                        self::$output[$field] = (new Validation(
                            new Rules\Date\Before($field, $request[$field], $configuration['parameters']))
                        )->validate();
                        break;

                    case 'after_date':
                        self::$output[$field] = (new Validation(
                            new Rules\Date\After($field, $request[$field], $configuration['parameters']))
                        )->validate();
                        break;

                    case 'between_dates':
                        self::$output[$field] = (new Validation(
                            new Rules\Date\Between($field, $request[$field], $configuration['parameters']))
                        )->validate();
                        break;

                    // String validation
                    case 'starts_with':
                        self::$output[$field] = (new Validation(
                            new Rules\String\StartsWith($field, $request[$field], $configuration['parameters']))
                        )->validate();
                        break;

                    case 'ends_with':
                        self::$output[$field] = (new Validation(
                            new Rules\String\EndsWith($field, $request[$field], $configuration['parameters']))
                        )->validate();
                        break;

                    case 'contains':
                        self::$output[$field] = (new Validation(
                            new Rules\String\Contains($field, $request[$field], $configuration['parameters']))
                        )->validate();
                        break;

                    case 'regex':
                        self::$output[$field] = (new Validation(
                            new Rules\String\Regex($field, $request[$field], $configuration['parameters']))
                        )->validate();
                        break;

                    case 'min_length':
                        self::$output[$field] = (new Validation(
                            new Rules\String\MinLength($field, $request[$field], $configuration['parameters']))
                        )->validate();
                        break;

                    case 'max_length':
                        self::$output[$field] = (new Validation(
                            new Rules\String\MaxLength($field, $request[$field], $configuration['parameters']))
                        )->validate();
                        break;

                    // String types
                    case 'email':
                        self::$output[$field] = (new Validation(
                            new Rules\String\Email($field, $request[$field], $configuration['parameters']))
                        )->validate();
                        break;

                    case 'url':
                        self::$output[$field] = (new Validation(
                            new Rules\String\Url($field, $request[$field], $configuration['parameters']))
                        )->validate();
                        break;

                    case 'domain':
                        self::$output[$field] = (new Validation(
                            new Rules\String\Domain($field, $request[$field], $configuration['parameters']))
                        )->validate();
                        break;

                    case 'ip':
                    case 'ip_address':
                        self::$output[$field] = (new Validation(
                            new Rules\String\IpAddress($field, $request[$field], $configuration['parameters']))
                        )->validate();
                        break;

                    case 'mac':
                    case 'mac_address':
                        self::$output[$field] = (new Validation(
                            new Rules\String\MacAddress($field, $request[$field], $configuration['parameters']))
                        )->validate();
                        break;

                    // Numeric validation
                    case 'num':
                    case 'numeric':
                        self::$output[$field] = (new Validation(
                            new Rules\Numeric\Numeric($field, $request[$field], $configuration['parameters']))
                        )->validate();
                        break;

                    case 'float':
                        self::$output[$field] = (new Validation(
                            new Rules\Numeric\ValidateFloat($field, $request[$field], $configuration['parameters']))
                        )->validate();
                        break;

                    case 'bool':
                    case 'boolean':
                        self::$output[$field] = (new Validation(
                            new Rules\Numeric\ValidateBool($field, $request[$field], $configuration['parameters']))
                        )->validate();
                        break;

                    case 'between':
                        self::$output[$field] = (new Validation(
                            new Rules\Numeric\Between($field, $request[$field], $configuration['parameters']))
                        )->validate();
                        break;

                    case 'min':
                    case 'minimum':
                        self::$output[$field] = (new Validation(
                            new Rules\Numeric\Min($field, $request[$field], $configuration['parameters']))
                        )->validate();
                        break;

                    case 'max':
                    case 'maximum':
                        self::$output[$field] = (new Validation(
                            new Rules\Numeric\Max($field, $request[$field], $configuration['parameters']))
                        )->validate();
                        break;

                    case 'equal':
                    case 'equals':
                    case 'equal_to':
                    case 'equals_to':
                        self::$output[$field] = (new Validation(
                            new Rules\Numeric\Equal($field, $request[$field], $configuration['parameters']))
                        )->validate();
                        break;

                    case 'not_equal':
                    case 'not_equal_to':
                        self::$output[$field] = (new Validation(
                            new Rules\Numeric\NotEqual($field, $request[$field], $configuration['parameters']))
                        )->validate();
                        break;

                    case 'gt':
                    case 'greater_than':
                        self::$output[$field] = (new Validation(
                            new Rules\Numeric\GreaterThan($field, $request[$field], $configuration['parameters']))
                        )->validate();
                        break;

                    case 'gte':
                    case 'greater_than_or_equal_to':
                        self::$output[$field] = (new Validation(
                            new Rules\Numeric\GreaterThanOrEqualTo($field, $request[$field], $configuration['parameters']))
                        )->validate();
                        break;

                    case 'lt':
                    case 'less_than':
                        self::$output[$field] = (new Validation(
                            new Rules\Numeric\LessThan($field, $request[$field], $configuration['parameters']))
                        )->validate();
                        break;

                    case 'lte':
                    case 'less_than_or_equal_to':
                        self::$output[$field] = (new Validation(
                            new Rules\Numeric\LessThanOrEqualTo($field, $request[$field], $configuration['parameters']))
                        )->validate();
                        break;

                    //--------------------------------------------------------------------------------------------------
                    // More validation rules can be added here
                    //--------------------------------------------------------------------------------------------------
                    //
                    //  EXAMPLE:
                    //
                    //  case 'rule':
                    //      self::$output[] = (new Validation(
                    //          new Rule($request[$field]))
                    //      )->validate();
                    //  break;
                    //
                    //--------------------------------------------------------------------------------------------------
                }
            }
        }

        return self::$output;
    }

    /**
     * This method extracts the parameters from the configuration
     * @param string $rule
     *
     * @return array
     */
    private function extractParameters(string &$rule): array
    {
        $parameters = null;

        // Checking if there are parameters for the rule
        if (strpos($rule, ':')) {
            preg_match('\:(.*)', $rule, $parameters);
        }

        return [
            'rule'          => $rule,
            'parameters'    => explode(',', $parameters)
        ];
    }
}