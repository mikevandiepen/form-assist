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
    'slq'           => Mediadevs\FormAssist\Sanitize\Filters\SanitizeSQL::class,
    'xss'           => Mediadevs\FormAssist\Sanitize\Filters\SanitizeXSS::class,
    'email'         => Mediadevs\FormAssist\Sanitize\Filters\SanitizeEmail::class,
    'float'         => Mediadevs\FormAssist\Sanitize\Filters\SanitizeFloat::class,
    'numeric'       => Mediadevs\FormAssist\Sanitize\Filters\SanitizeNumeric::class,
    'url'           => Mediadevs\FormAssist\Sanitize\Filters\SanitizeUrl::class,
    'slugify'       => Mediadevs\FormAssist\Sanitize\Filters\Slugify::class,
    'json_decode'   => Mediadevs\FormAssist\Sanitize\Filters\JsonDecode::class,
    'json_encode'   => Mediadevs\FormAssist\Sanitize\Filters\JsonEncode::class,
    'left_trim'     => Mediadevs\FormAssist\Sanitize\Filters\LeftTrim::class,
    'right_trim'    => Mediadevs\FormAssist\Sanitize\Filters\RightTrim::class,
    'trim_all'      => Mediadevs\FormAssist\Sanitize\Filters\Trim::class,
    'lowercase'     => Mediadevs\FormAssist\Sanitize\Filters\LowerCase::class,
    'uppercase'     => Mediadevs\FormAssist\Sanitize\Filters\UpperCase::class,
    'strip_tags'    => Mediadevs\FormAssist\Sanitize\Filters\StripTags::class,

    //------------------------------------------------------------------------------------------------------------------
    //                           Please register your custom sanitization filters down bellow
    //------------------------------------------------------------------------------------------------------------------
];
