<?php

namespace mikevandiepen\utility;

use mysqli;
use mikevandiepen\utility\Sanitize\Sanitizer;
use mikevandiepen\utility\Validate\Validator;

class Form
{
    /**
     * The validator class will be stored in here.
     * @var Validator
     */
    private static $validator;

    /**
     * @param array  $request
     * @param array  $config
     * @param string $language
     *
     * @return void
     */
    public static function validate(array $request, array $config = array(), string $language = 'default') : void
    {
        self::$validator = (new Validator($request, $config, $language))->validate();
    }

    /**
     * @param array       $request
     * @param array       $config
     * @param null|mysqli $link
     *
     * @return array
     */
    public static function sanitize(array $request, array $config = array(), $link = null) : array
    {
        return (new Sanitizer($request, $config, $link))->sanitize();
    }

    /**
     * Collecting the validation messages from the Validator class
     * @return string
     */
    public static function validationResponse() : string
    {
        return self::$validator->responseMessages();
    }

    /**
     * Returns whether the requests passes the validation
     * @return bool
     */
    public static function validationPasses() : bool
    {
        return self::$validator->passesValidation();
    }
}
