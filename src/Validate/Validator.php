<?php

namespace mikevandiepen\utility\Validate;

use mikevandiepen\utility\Validate\Date\After;
use mikevandiepen\utility\Validate\Date\Before;
use mikevandiepen\utility\Validate\Date\Between;

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
    public function sanitize(array $request, array $config = []): array
    {
        // Parsing through all the fields
        foreach ($config as $field => $filters) {

            // Parsing through the filters and applying them to each field
            foreach (explode('|', $filters) as $filter) {
                switch ($filter) {

                    case 'before':
                        self::$output[$field] = (new Validation(
                            new Before($field, $request[$field]))
                        )->validate();
                        break;

                    case 'after':
                        self::$output[$field] = (new Validation(
                            new After($field, $request[$field]))
                        )->validate();
                        break;

                    case 'between':
                        self::$output[$field] = (new Validation(
                            new Between($field, $request[$field]))
                        )->validate();
                        break;

                    //------------------------------------------------------------------------------------------------------
                    // More sanitization filters can be added here
                    //------------------------------------------------------------------------------------------------------
                    //
                    //  EXAMPLE:
                    //
                    //  case 'rule':
                    //      self::$output[] = (new Validation(
                    //          new Rule($request[$field]))
                    //      )->validate();
                    //  break;
                    //
                    //------------------------------------------------------------------------------------------------------
                }
            }
        }

        return self::$output;
    }
}