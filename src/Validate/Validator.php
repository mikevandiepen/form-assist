<?php

namespace mikevandiepen\utility\Validate;

class Validator
{
    /**
     * All cleaned output will be stored in here
     * @var array
     */
    private static $output = array();

    /**
     * Validating all the values and applying all the assigned rules
     * @param array $request
     * @param array $config
     * @return string
     */
    public function validate(array $request, array $config = array()): string
    {
        // Parsing through all the fields
        foreach ($config as $field => $rules) {

            // Casting field to an array
            $field = array($field);

            // Parsing through the filters and applying them to each field
            foreach (explode('|', $rules) as $rule) {

                // Extracting the parameters
                $configuration = $this->getParameters($rule);

                // Transforming the string to lowercase to be more flexible to the end user
                switch (strtolower($configuration['rule'])) {

                    // Basic validation
                    case 'required':
                        self::$output[$field] = (new Validation(
                            new Rules\Basic\Required($field, $request[$field], $configuration['parameters'])
                        ))->validate();
                        break;

                    // Type validation
                    case 'num':
                    case 'numeric':
                        self::$output[$field] = (new Validation(
                            new Rules\Types\TypeNumeric($field, $request[$field], $configuration['parameters'])
                        ))->validate();
                        break;

                    case 'float':
                        self::$output[$field] = (new Validation(
                            new Rules\Types\TypeFloat($field, $request[$field], $configuration['parameters'])
                        ))->validate();
                        break;

                    case 'bool':
                    case 'boolean':
                        self::$output[$field] = (new Validation(
                            new Rules\Types\TypeBoolean($field, $request[$field], $configuration['parameters'])
                        ))->validate();
                        break;

                    case 'int':
                    case 'integer':
                        self::$output[$field] = (new Validation(
                            new Rules\Types\TypeInteger($field, $request[$field], $configuration['parameters'])
                        ))->validate();
                        break;

                    case 'null':
                        self::$output[$field] = (new Validation(
                            new Rules\Types\TypeNull($field, $request[$field], $configuration['parameters'])
                        ))->validate();
                        break;

                    case 'string':
                        self::$output[$field] = (new Validation(
                            new Rules\Types\TypeString($field, $request[$field], $configuration['parameters'])
                        ))->validate();
                        break;

                    case 'array':
                        self::$output[$field] = (new Validation(
                            new Rules\Types\TypeArray($field, $request[$field], $configuration['parameters'])
                        ))->validate();
                        break;

                    // Date validation
                    case 'before_date':
                        self::$output[$field] = (new Validation(
                            new Rules\Date\Before($field, $request[$field], $configuration['parameters'])
                        ))->validate();
                        break;

                    case 'after_date':
                        self::$output[$field] = (new Validation(
                            new Rules\Date\After($field, $request[$field], $configuration['parameters'])
                        ))->validate();
                        break;

                    case 'between_dates':
                        self::$output[$field] = (new Validation(
                            new Rules\Date\Between($field, $request[$field], $configuration['parameters'])
                        ))->validate();
                        break;

                    // String validation
                    case 'starts_with':
                        self::$output[$field] = (new Validation(
                            new Rules\String\StartsWith($field, $request[$field], $configuration['parameters'])
                        ))->validate();
                        break;

                    case 'ends_with':
                        self::$output[$field] = (new Validation(
                            new Rules\String\EndsWith($field, $request[$field], $configuration['parameters'])
                        ))->validate();
                        break;

                    case 'contains':
                        self::$output[$field] = (new Validation(
                            new Rules\String\Contains($field, $request[$field], $configuration['parameters'])
                        ))->validate();
                        break;

                    case 'regex':
                        self::$output[$field] = (new Validation(
                            new Rules\String\Regex($field, $request[$field], $configuration['parameters'])
                        ))->validate();
                        break;

                    case 'exact_length':
                        self::$output[$field] = (new Validation(
                            new Rules\String\ExactLength($field, $request[$field], $configuration['parameters'])
                        ))->validate();
                        break;

                    case 'min_length':
                        self::$output[$field] = (new Validation(
                            new Rules\String\MinLength($field, $request[$field], $configuration['parameters'])
                        ))->validate();
                        break;

                    case 'max_length':
                        self::$output[$field] = (new Validation(
                            new Rules\String\MaxLength($field, $request[$field], $configuration['parameters'])
                        ))->validate();
                        break;

                    // String types
                    case 'email':
                        self::$output[$field] = (new Validation(
                            new Rules\String\Email($field, $request[$field], $configuration['parameters'])
                        ))->validate();
                        break;

                    case 'url':
                        self::$output[$field] = (new Validation(
                            new Rules\String\Url($field, $request[$field], $configuration['parameters'])
                        ))->validate();
                        break;

                    case 'domain':
                        self::$output[$field] = (new Validation(
                            new Rules\String\Domain($field, $request[$field], $configuration['parameters'])
                        ))->validate();
                        break;

                    case 'ip':
                    case 'ip_address':
                        self::$output[$field] = (new Validation(
                            new Rules\String\IpAddress($field, $request[$field], $configuration['parameters'])
                        ))->validate();
                        break;

                    case 'mac':
                    case 'mac_address':
                        self::$output[$field] = (new Validation(
                            new Rules\String\MacAddress($field, $request[$field], $configuration['parameters'])
                        ))->validate();
                        break;

                    // Numeric validation
                    case 'between':
                        self::$output[$field] = (new Validation(
                            new Rules\Numeric\Between($field, $request[$field], $configuration['parameters'])
                        ))->validate();
                        break;

                    case 'min':
                    case 'minimum':
                        self::$output[$field] = (new Validation(
                            new Rules\Numeric\Min($field, $request[$field], $configuration['parameters'])
                        ))->validate();
                        break;

                    case 'max':
                    case 'maximum':
                        self::$output[$field] = (new Validation(
                            new Rules\Numeric\Max($field, $request[$field], $configuration['parameters'])
                        ))->validate();
                        break;

                    case 'equal':
                    case 'equals':
                    case 'equal_to':
                    case 'equals_to':
                        self::$output[$field] = (new Validation(
                            new Rules\Numeric\Equal($field, $request[$field], $configuration['parameters'])
                        ))->validate();
                        break;

                    case 'not_equal':
                    case 'not_equal_to':
                        self::$output[$field] = (new Validation(
                            new Rules\Numeric\NotEqual($field, $request[$field], $configuration['parameters'])
                        ))->validate();
                        break;

                    case 'gt':
                    case 'greater_than':
                        self::$output[$field] = (new Validation(
                            new Rules\Numeric\GreaterThan($field, $request[$field], $configuration['parameters'])
                        ))->validate();
                        break;

                    case 'gte':
                    case 'greater_than_or_equal_to':
                        self::$output[$field] = (new Validation(
                            new Rules\Numeric\GreaterThanOrEqualTo($field, $request[$field], $configuration['parameters'])
                        ))->validate();
                        break;

                    case 'lt':
                    case 'less_than':
                        self::$output[$field] = (new Validation(
                            new Rules\Numeric\LessThan($field, $request[$field], $configuration['parameters'])
                        ))->validate();
                        break;

                    case 'lte':
                    case 'less_than_or_equal_to':
                        self::$output[$field] = (new Validation(
                            new Rules\Numeric\LessThanOrEqualTo($field, $request[$field], $configuration['parameters'])
                        ))->validate();
                        break;

                    // File validation
                    case 'allowed_extensions':
                        self::$output[$field] = (new Validation(
                            new  Rules\File\AllowedExtensions($field, $request[$field], $configuration['parameters'])
                        ))->validate();
                        break;

                    case 'allowed_mime_types':
                        self::$output[$field] = (new Validation(
                            new  Rules\File\AllowedMimeType($field, $request[$field], $configuration['parameters'])
                        ))->validate();
                        break;

                    case 'max_size':
                    case 'max_file_size':
                        self::$output[$field] = (new Validation(
                            new  Rules\File\MaxFileSize($field, $request[$field], $configuration['parameters'])
                        ))->validate();
                        break;

                    //--------------------------------------------------------------------------------------------------
                    // More validation rules can be added here
                    //--------------------------------------------------------------------------------------------------
                    //
                    //  EXAMPLE:
                    //
                    //  case 'rule':
                    //      self::$output[] = (new Validation(
                    //          new Rules\RuleType\RuleName($field, $request[$field], $configuration['parameters']))
                    //      )->validate();
                    //  break;
                    //
                    //--------------------------------------------------------------------------------------------------
                }
            }
        }

        return json_encode(self::$output, JSON_PRETTY_PRINT);
    }

    /**
     * This method extracts the parameters from the configuration
     * Parameters are all the values after an       ( : ).
     * Multiple parameters are separated by comma   ( , ).
     * @param string $rule
     *
     * @return array
     */
    private function getParameters(string &$rule): array
    {
        $parameters = null;

        // Checking if there are parameters for the rule
        if (strpos($rule, ':')) {
            preg_match('\:(.*)', $rule, $parameters);
        }

        return [
            'rule'          => strtolower($rule),
            'parameters'    => explode(',', $parameters)
        ];
    }
}