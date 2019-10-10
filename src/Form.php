<?php

namespace mikevandiepen\utility;

use mikevandiepen\utility\Sanitize\Sanitizer;
use mikevandiepen\utility\Validate\Validator;

class Form
{
    public static function validate(array $request, array $config = array())
    {
        return (new Validator())->validate($request);
    }

    public static function sanitize(array $request, array $config = array())
    {
        return (new Sanitizer())->sanitize($request, $config);
    }
}