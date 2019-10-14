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
    public function validate(array $request, array $config = []): array
    {
        // Parsing through all the fields
        foreach ($config as $field => $rules) {

            // Parsing through the filters and applying them to each field
            foreach (explode('|', $rules) as $rule) {
                switch ($rule) {

                    // Date validation
                    case 'before_date':
                        self::$output[$field] = (new Validation(
                            new Date\Before($field, $request[$field]))
                        )->validate();
                        break;

                    case 'after_date':
                        self::$output[$field] = (new Validation(
                            new Date\After($field, $request[$field]))
                        )->validate();
                        break;

                    case 'between_dates':
                        self::$output[$field] = (new Validation(
                            new Date\Between($field, $request[$field]))
                        )->validate();
                        break;

                    // String validation
                    case 'starts_with':
                        self::$output[$field] = (new Validation(
                            new String\StartsWith($field, $request[$field]))
                        )->validate();
                        break;

                    case 'ends_with':
                        self::$output[$field] = (new Validation(
                            new String\EndsWith($field, $request[$field]))
                        )->validate();
                        break;

                    case 'contains':
                        self::$output[$field] = (new Validation(
                            new String\Contains($field, $request[$field]))
                        )->validate();
                        break;

                    case 'regex':
                        self::$output[$field] = (new Validation(
                            new String\Regex($field, $request[$field]))
                        )->validate();
                        break;

                    case 'min_length':
                        self::$output[$field] = (new Validation(
                            new String\MinLength($field, $request[$field]))
                        )->validate();
                        break;

                    case 'max_length':
                        self::$output[$field] = (new Validation(
                            new String\MaxLength($field, $request[$field]))
                        )->validate();
                        break;

                    // String types
                    case 'email':
                        self::$output[$field] = (new Validation(
                            new String\Email($field, $request[$field]))
                        )->validate();
                        break;

                    case 'Url':
                        self::$output[$field] = (new Validation(
                            new String\Url($field, $request[$field]))
                        )->validate();
                        break;

                    case 'domain':
                        self::$output[$field] = (new Validation(
                            new String\Domain($field, $request[$field]))
                        )->validate();
                        break;

                    case 'ip':
                    case 'ip_address':
                        self::$output[$field] = (new Validation(
                            new String\IpAddress($field, $request[$field]))
                        )->validate();
                        break;

                    case 'mac':
                    case 'mac_address':
                        self::$output[$field] = (new Validation(
                            new String\MacAddress($field, $request[$field]))
                        )->validate();
                        break;

                    // Numeric validation
                    case 'num':
                    case 'numeric':
                        self::$output[$field] = (new Validation(
                            new Numeric\Numeric($field, $request[$field]))
                        )->validate();
                        break;

                    case 'float':
                        self::$output[$field] = (new Validation(
                            new Numeric\ValidateFloat($field, $request[$field]))
                        )->validate();
                        break;

                    case 'bool':
                    case 'boolean':
                        self::$output[$field] = (new Validation(
                            new Numeric\ValidateBool($field, $request[$field]))
                        )->validate();
                        break;

                    case 'between':
                        self::$output[$field] = (new Validation(
                            new Numeric\Between($field, $request[$field]))
                        )->validate();
                        break;

                    case 'min':
                    case 'minimum':
                        self::$output[$field] = (new Validation(
                            new Numeric\Min($field, $request[$field]))
                        )->validate();
                        break;

                    case 'max':
                    case 'maximum':
                        self::$output[$field] = (new Validation(
                            new Numeric\Max($field, $request[$field]))
                        )->validate();
                        break;

                    case 'equal':
                    case 'equals':
                    case 'equal_to':
                    case 'equals_to':
                        self::$output[$field] = (new Validation(
                            new Numeric\Equal($field, $request[$field]))
                        )->validate();
                        break;

                    case 'not_equal':
                    case 'not_equal_to':
                        self::$output[$field] = (new Validation(
                            new Numeric\NotEqual($field, $request[$field]))
                        )->validate();
                        break;

                    case 'gt':
                    case 'greater_than':
                        self::$output[$field] = (new Validation(
                            new Numeric\GreaterThan($field, $request[$field]))
                        )->validate();
                        break;

                    case 'gte':
                    case 'greater_than_or_equal_to':
                        self::$output[$field] = (new Validation(
                            new Numeric\GreaterThanOrEqualTo($field, $request[$field]))
                        )->validate();
                        break;

                    case 'lt':
                    case 'less_than':
                        self::$output[$field] = (new Validation(
                            new Numeric\LessThan($field, $request[$field]))
                        )->validate();
                        break;

                    case 'lte':
                    case 'less_than_or_equal_to':
                        self::$output[$field] = (new Validation(
                            new Numeric\LessThanOrEqualTo($field, $request[$field]))
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
}