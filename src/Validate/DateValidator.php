<?php

namespace mikevandiepen\utility\Validate;

use mikevandiepen\utility\Validate\Date\After;
use mikevandiepen\utility\Validate\Date\Before;
use mikevandiepen\utility\Validate\Date\Between;

class DateValidator
{
    /**
     * All error messages will be stored in here
     * @var array
     */
    private static $errors = array();

    /**
     * Validating all the values and applying all the assigned rules
     * @param array $request
     * @return array
     */
    public static function validate(array $request = array()): array
    {
        // Parsing through all the fields
        foreach ($request as $field) {

            // Transforming the rules to an array
            $rules = explode('|', $field['rules']);

            // Iterating through the rules
            foreach ($rules as $rule) {

                // Applying the validation rule for the current iteration
                switch($rule) {
                    case 'before':
                        $error = (new Validation(
                            new Before($field['name'], $field['value']))
                        )->validate();
                        break;

                    case 'after':
                        $error = (new Validation(
                            new After($field['name'], $field['value']))
                        )->validate();
                        break;

                    case 'between':
                        $error = (new Validation(
                            new Between($field['name'], $field['value']))
                        )->validate();
                        break;

                    default:
                        $error = [];
                }

                self::$errors[$field['name']]['errors'][] = $error;
            }
        }

        return self::$errors;
    }
}