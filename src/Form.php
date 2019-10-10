<?php

namespace mikevandiepen\utility;

use mikevandiepen\utility\Request\Sanitization;
use mikevandiepen\utility\Request\Filters\Trim;
use mikevandiepen\utility\Request\Filters\Slugify;
use mikevandiepen\utility\Request\Filters\LeftTrim;
use mikevandiepen\utility\Request\Filters\RightTrim;
use mikevandiepen\utility\Request\Filters\StripTags;
use mikevandiepen\utility\Request\Filters\LowerCase;
use mikevandiepen\utility\Request\Filters\UpperCase;
use mikevandiepen\utility\Request\Filters\JsonDecode;
use mikevandiepen\utility\Request\Filters\JsonEncode;
use mikevandiepen\utility\Request\Filters\SanitizeUrl;
use mikevandiepen\utility\Request\Filters\SanitizeSQL;
use mikevandiepen\utility\Request\Filters\SanitizeXSS;
use mikevandiepen\utility\Request\Filters\SanitizeEmail;
use mikevandiepen\utility\Request\Filters\SanitizeFloat;
use mikevandiepen\utility\Request\Filters\SanitizeNumeric;

class Form
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
     *
     * @return array
     */
    public static function sanitize(array $request, array $config = array()) : array
    {
        // Parsing through all the fields
        foreach($config as $field => $filters) {

            // Parsing through the filters and applying them to each field
            foreach(explode('|', $filters) as $filter) {
                switch($filter) {

                    case 'sql':
                        self::$output[] = (new Sanitization(
                            new SanitizeSQL($request[$field]))
                        )->sanitize();
                        break;

                    case 'xss':
                        self::$output[] = (new Sanitization(
                            new SanitizeXSS($request[$field]))
                        )->sanitize();
                        break;

                    case 'email':
                        self::$output[] = (new Sanitization(
                            new SanitizeEmail($request[$field]))
                        )->sanitize();
                        break;

                    case 'url':
                        self::$output[] = (new Sanitization(
                            new SanitizeUrl($request[$field]))
                        )->sanitize();
                        break;

                    case 'numbers':
                        self::$output[] = (new Sanitization(
                            new SanitizeNumeric($request[$field]))
                        )->sanitize();
                        break;

                    case 'float':
                        self::$output[] = (new Sanitization(
                            new SanitizeFloat($request[$field]))
                        )->sanitize();
                        break;

                    case 'json_encode':
                    case 'encode_json':
                        self::$output[] = (new Sanitization(
                            new JsonEncode($request[$field]))
                        )->sanitize();
                        break;

                    case 'json_decode':
                    case 'decode_json':
                        self::$output[] = (new Sanitization(
                            new JsonDecode($request[$field]))
                        )->sanitize();
                        break;

                    case 'trim':
                    case 'trim_all':
                        self::$output[] = (new Sanitization(
                            new Trim($request[$field]))
                        )->sanitize();
                        break;

                    case 'ltrim':
                    case 'left_trim':
                    case 'trim_left':
                        self::$output[] = (new Sanitization(
                            new LeftTrim($request[$field]))
                        )->sanitize();
                        break;

                    case 'rtrim':
                    case 'right_trim':
                    case 'trim_right':
                        self::$output[] = (new Sanitization(
                            new RightTrim($request[$field]))
                        )->sanitize();
                        break;

                    case 'upper':
                    case 'uppercase':
                        self::$output[] = (new Sanitization(
                            new UpperCase($request[$field]))
                        )->sanitize();
                        break;

                    case 'lower':
                    case 'lowercase':
                        self::$output[] = (new Sanitization(
                            new LowerCase($request[$field]))
                        )->sanitize();
                        break;

                    case 'slug':
                    case 'slugify':
                    case 'to_slug':
                        self::$output[] = (new Sanitization(
                            new Slugify($request[$field]))
                        )->sanitize();
                        break;

                    case 'tags':
                    case 'strip_tags':
                        self::$output[] = (new Sanitization(
                            new StripTags($request[$field]))
                        )->sanitize();
                        break;

                    //------------------------------------------------------------------------------------------------------
                    // More sanitization filters can be added here
                    //------------------------------------------------------------------------------------------------------
                    //
                    //  EXAMPLE:
                    //
                    //  case 'filter':
                    //      self::$output[] = (new Sanitization(
                    //          new Filter($request[$field]))
                    //      )->sanitize();
                    //  break;
                    //
                    //------------------------------------------------------------------------------------------------------
                }
            }
        }

        return self::$output;
    }
}