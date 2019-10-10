<?php

namespace mikevandiepen\utility\Validate;



use mikevandiepen\utility\Validate\StringTypes\Domain;
use mikevandiepen\utility\Validate\StringTypes\Email;
use mikevandiepen\utility\Validate\StringTypes\IpAddress;
use mikevandiepen\utility\Validate\StringTypes\MacAddress;
use mikevandiepen\utility\Validate\StringTypes\Url;

class TypeValidator
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
                    case 'email':
                        $error = (new Validation(
                            new Email($field['name'], $field['value']))
                        )->validate();
                        break;

                    case 'Url':
                        $error = (new Validation(
                            new Url($field['name'], $field['value']))
                        )->validate();
                        break;

                    case 'domain':
                        $error = (new Validation(
                            new Domain($field['name'], $field['value']))
                        )->validate();
                        break;

                    case 'ip':
                    case 'ip_address':
                        $error = (new Validation(
                            new IpAddress($field['name'], $field['value']))
                        )->validate();
                        break;

                    case 'mac':
                    case 'mac_address':
                        $error = (new Validation(
                            new MacAddress($field['name'], $field['value']))
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