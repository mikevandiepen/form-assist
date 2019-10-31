<?php
//----------------------------------------------------------------------------------------------------------------------
//                                       How to register your new sanitization filter
//----------------------------------------------------------------------------------------------------------------------
//
//  For each new filter your create you need to add the configuration here.
//  If the filter is not registered it can not be used.
//  The values you have to fill are:
//      - filter (Generally how your filter is named, the translations will be looked up according to this name)
//      - class (The classname of the sanitization filter)
//
//  Structure:
//  'filter' => vendor\package\Sanitize\Filters\RuleName::class,
//
//  If your filter has aliases, you need to register the alias inside '/config/filters_aliases.php'. More details are inside
//  the filters_aliases file.
//
//----------------------------------------------------------------------------------------------------------------------
//                             Did you add a new filter? Please submit it to the repository!
//----------------------------------------------------------------------------------------------------------------------

return [
    'slq'           => mikevandiepen\utility\Sanitize\Filters\SanitizeSQL::class,
    'xss'           => mikevandiepen\utility\Sanitize\Filters\SanitizeXSS::class,
    'email'         => mikevandiepen\utility\Sanitize\Filters\SanitizeEmail::class,
    'float'         => mikevandiepen\utility\Sanitize\Filters\SanitizeFloat::class,
    'numeric'       => mikevandiepen\utility\Sanitize\Filters\SanitizeNumeric::class,
    'url'           => mikevandiepen\utility\Sanitize\Filters\SanitizeUrl::class,
    'slugify'       => mikevandiepen\utility\Sanitize\Filters\Slugify::class,
    'json_decode'   => mikevandiepen\utility\Sanitize\Filters\JsonDecode::class,
    'json_encode'   => mikevandiepen\utility\Sanitize\Filters\JsonEncode::class,
    'left_trim'     => mikevandiepen\utility\Sanitize\Filters\LeftTrim::class,
    'right_trim'    => mikevandiepen\utility\Sanitize\Filters\RightTrim::class,
    'trim_all'      => mikevandiepen\utility\Sanitize\Filters\Trim::class,
    'lowercase'     => mikevandiepen\utility\Sanitize\Filters\LowerCase::class,
    'uppercase'     => mikevandiepen\utility\Sanitize\Filters\UpperCase::class,
    'strip_tags'    => mikevandiepen\utility\Sanitize\Filters\StripTags::class,

    //------------------------------------------------------------------------------------------------------------------
    //                           Please register your custom sanitization filters down bellow
    //------------------------------------------------------------------------------------------------------------------
];
