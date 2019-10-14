<?php

namespace mikevandiepen\utility;

use mikevandiepen\utility\Sanitize\Sanitizer;
use mikevandiepen\utility\Validate\Validator;

class Form
{
    /**
     * @param array $request
     * @param array $config
     *
     * @return array
     */
    public static function validate(array $request, array $config = array())
    {
        return (new Validator())->validate($request);
    }

    /**
     * @param array $request
     * @param array $config
     * @param null  $link
     *
     * @return array
     */
    public static function sanitize(array $request, array $config = array(), ?$link = null)
    {
        return (new Sanitizer())->sanitize($request, $config, $link);
    }
}