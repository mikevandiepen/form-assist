<?php

namespace mikevandiepen\utility;

use mikevandiepen\utility\Sanitize\Sanitizer;
use mikevandiepen\utility\Validate\Validator;

class Form
{
    /**
     * The language which should be used for error reporting
     * @var string
     */
    private static $language = 'en';

    /**
     * Defining the language for error reporting
     * @param string $language
     */
    public static function language(string $language = 'en')
    {
        self::$language = $language;
    }

    /**
     * @param array $request
     * @param array $config
     *
     * @return string
     */
    public static function validate(array $request, array $config = array()) : string
    {
        return (new Validator())->validate($request, $config);
    }

    /**
     * @param array $request
     * @param array $config
     * @param null  $link
     *
     * @return array
     */
    public static function sanitize(array $request, array $config = array(), $link = null)
    {
        return (new Sanitizer())->sanitize($request, $config, $link);
    }

    /**
     * Cross site request forgery protection
     * @return void
     */
    public static function csrf() : void
    {
        /**
         * TODO: Implement CSRF protection
         */
    }

    /**
     * Protecting submits from outside providers. As an example bots / scripts
     * @return void
     */
    public static function honeypot()
    {
        /**
         * TODO: Implement a honeypot to trick bots / scripts
         */
    }

    /**
     * Protecting submits from outside providers. As an example bots / scripts
     * @return void
     */
    public static function reCaptcha() : void
    {
        /**
         * TODO: Implement reCaptcha protection
         */
    }
}