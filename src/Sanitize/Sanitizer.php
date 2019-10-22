<?php

namespace mikevandiepen\utility\Sanitize;

use mysqli;

class Sanitizer
{
    /**
     * All cleaned output will be stored in here
     * @var array
     */
    private static $output = array();

    /**
     * Validating all the values and applying all the assigned rules
     * @param array       $request
     * @param array       $config
     * @param null|mysqli $link
     *
     * @return array
     */
    public function sanitize(array $request, array $config = array(), $link = null) : array
    {
        // Parsing through all the fields
        foreach($config as $field => $filters) {

            // Parsing through the filters and applying them to each field
            foreach(explode('|', $filters) as $filter) {
                switch($filter) {

                    case 'sql':
                        self::$output[$field] = (string) (new Sanitization(
                            new Filters\SanitizeSQL($request[$field], $link))
                        )->sanitize();
                        break;

                    case 'xss':
                        self::$output[$field] = (string) (new Sanitization(
                            new Filters\SanitizeXSS($request[$field]))
                        )->sanitize();
                        break;

                    case 'email':
                        self::$output[$field] = (string) (new Sanitization(
                            new Filters\SanitizeEmail($request[$field]))
                        )->sanitize();
                        break;

                    case 'url':
                        self::$output[$field] = (string) (new Sanitization(
                            new Filters\SanitizeUrl($request[$field]))
                        )->sanitize();
                        break;

                    case 'numbers':
                        self::$output[$field] = (string) (new Sanitization(
                            new Filters\SanitizeNumeric($request[$field]))
                        )->sanitize();
                        break;

                    case 'float':
                        self::$output[$field] = (string) (new Sanitization(
                            new Filters\SanitizeFloat($request[$field]))
                        )->sanitize();
                        break;

                    case 'json_encode':
                    case 'encode_json':
                        self::$output[$field] = (string) (new Sanitization(
                            new Filters\JsonEncode($request[$field]))
                        )->sanitize();
                        break;

                    case 'json_decode':
                    case 'decode_json':
                        self::$output[$field] = (string) (new Sanitization(
                            new Filters\JsonDecode($request[$field]))
                        )->sanitize();
                        break;

                    case 'trim':
                    case 'trim_all':
                        self::$output[$field] = (string) (new Sanitization(
                            new Filters\Trim($request[$field]))
                        )->sanitize();
                        break;

                    case 'ltrim':
                    case 'left_trim':
                    case 'trim_left':
                        self::$output[$field] = (string) (new Sanitization(
                            new Filters\LeftTrim($request[$field]))
                        )->sanitize();
                        break;

                    case 'rtrim':
                    case 'right_trim':
                    case 'trim_right':
                        self::$output[$field] = (string) (new Sanitization(
                            new Filters\RightTrim($request[$field]))
                        )->sanitize();
                        break;

                    case 'upper':
                    case 'uppercase':
                        self::$output[$field] = (string) (new Sanitization(
                            new Filters\UpperCase($request[$field]))
                        )->sanitize();
                        break;

                    case 'lower':
                    case 'lowercase':
                        self::$output[$field] = (string) (new Sanitization(
                                new Filters\LowerCase($request[$field])
                            ))->sanitize();
                        break;

                    case 'slug':
                    case 'slugify':
                    case 'to_slug':
                        self::$output[$field] = (string) (new Sanitization(
                            new Filters\Slugify($request[$field]))
                        )->sanitize();
                        break;

                    case 'tags':
                    case 'strip_tags':
                        self::$output[$field] = (string) (new Sanitization(
                            new Filters\StripTags($request[$field]))
                        )->sanitize();
                        break;

                    //--------------------------------------------------------------------------------------------------
                    // More sanitization filters can be added here
                    //--------------------------------------------------------------------------------------------------
                    //
                    //  EXAMPLE:
                    //
                    //  case 'filter':
                    //      self::$output[$field] = (string) (new Sanitization(
                    //          new Filters\Filter($request[$field]))
                    //      )->sanitize();
                    //  break;
                    //
                    //--------------------------------------------------------------------------------------------------
                }
            }
        }

        return self::$output;
    }
}
