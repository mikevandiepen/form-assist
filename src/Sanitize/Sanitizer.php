<?php

namespace mikevandiepen\utility\Sanitize;

use mikevandiepen\utility\Sanitize\Filters\Trim;
use mikevandiepen\utility\Sanitize\Filters\Slugify;
use mikevandiepen\utility\Sanitize\Filters\LeftTrim;
use mikevandiepen\utility\Sanitize\Filters\RightTrim;
use mikevandiepen\utility\Sanitize\Filters\StripTags;
use mikevandiepen\utility\Sanitize\Filters\LowerCase;
use mikevandiepen\utility\Sanitize\Filters\UpperCase;
use mikevandiepen\utility\Sanitize\Filters\JsonDecode;
use mikevandiepen\utility\Sanitize\Filters\JsonEncode;
use mikevandiepen\utility\Sanitize\Filters\SanitizeUrl;
use mikevandiepen\utility\Sanitize\Filters\SanitizeSQL;
use mikevandiepen\utility\Sanitize\Filters\SanitizeXSS;
use mikevandiepen\utility\Sanitize\Filters\SanitizeEmail;
use mikevandiepen\utility\Sanitize\Filters\SanitizeFloat;
use mikevandiepen\utility\Sanitize\Filters\SanitizeNumeric;

class Sanitizer
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
     * @param null  $link
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
                        self::$output[$field] = (new Sanitization(
                            new SanitizeSQL($request[$field], $link))
                        )->sanitize();
                        break;

                    case 'xss':
                        self::$output[$field] = (new Sanitization(
                            new SanitizeXSS($request[$field]))
                        )->sanitize();
                        break;

                    case 'email':
                        self::$output[$field] = (new Sanitization(
                            new SanitizeEmail($request[$field]))
                        )->sanitize();
                        break;

                    case 'url':
                        self::$output[$field] = (new Sanitization(
                            new SanitizeUrl($request[$field]))
                        )->sanitize();
                        break;

                    case 'numbers':
                        self::$output[$field] = (new Sanitization(
                            new SanitizeNumeric($request[$field]))
                        )->sanitize();
                        break;

                    case 'float':
                        self::$output[$field] = (new Sanitization(
                            new SanitizeFloat($request[$field]))
                        )->sanitize();
                        break;

                    case 'json_encode':
                    case 'encode_json':
                        self::$output[$field] = (new Sanitization(
                            new JsonEncode($request[$field]))
                        )->sanitize();
                        break;

                    case 'json_decode':
                    case 'decode_json':
                        self::$output[$field] = (new Sanitization(
                            new JsonDecode($request[$field]))
                        )->sanitize();
                        break;

                    case 'trim':
                    case 'trim_all':
                        self::$output[$field] = (new Sanitization(
                            new Trim($request[$field]))
                        )->sanitize();
                        break;

                    case 'ltrim':
                    case 'left_trim':
                    case 'trim_left':
                        self::$output[$field] = (new Sanitization(
                            new LeftTrim($request[$field]))
                        )->sanitize();
                        break;

                    case 'rtrim':
                    case 'right_trim':
                    case 'trim_right':
                        self::$output[$field] = (new Sanitization(
                            new RightTrim($request[$field]))
                        )->sanitize();
                        break;

                    case 'upper':
                    case 'uppercase':
                        self::$output[$field] = (new Sanitization(
                            new UpperCase($request[$field]))
                        )->sanitize();
                        break;

                    case 'lower':
                    case 'lowercase':
                        self::$output[$field] = (new Sanitization(
                                new LowerCase($request[$field])
                            ))->sanitize();
                        break;

                    case 'slug':
                    case 'slugify':
                    case 'to_slug':
                        self::$output[$field] = (new Sanitization(
                            new Slugify($request[$field]))
                        )->sanitize();
                        break;

                    case 'tags':
                    case 'strip_tags':
                        self::$output[$field] = (new Sanitization(
                            new StripTags($request[$field]))
                        )->sanitize();
                        break;

                    //--------------------------------------------------------------------------------------------------
                    // More sanitization filters can be added here
                    //--------------------------------------------------------------------------------------------------
                    //
                    //  EXAMPLE:
                    //
                    //  case 'filter':
                    //      self::$output[$field] = (new Sanitization(
                    //          new Filter($request[$field]))
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
