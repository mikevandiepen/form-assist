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
//  'filter' => [
//      'class'     => 'FilterClassName'
//  ],
//
//  If your filter has aliases, you need to register the alias inside '/config/filters_aliases.php'. More details are inside
//  the filters_aliases file.
//
//----------------------------------------------------------------------------------------------------------------------
//                            Did you add a new filter? Please submit it to the repository!
//----------------------------------------------------------------------------------------------------------------------

return [
    'slq'           => 'SanitizeSQL',
    'xss'           => 'SanitizeXSS',
    'email'         => 'SanitizeEmail',
    'float'         => 'SanitizeFloat',
    'numeric'       => 'SanitizeNumeric',
    'url'           => 'SanitizeUrl',
    'slugify'       => 'Slugify',
    'json_decode'   => 'JsonDecode',
    'json_encode'   => 'JsonEncode',
    'left_trim'     => 'LeftTrim',
    'right_trim'    => 'RightTrim',
    'trim_all'      => 'Trim',
    'lowercase'     => 'LowerCase',
    'uppercase'     => 'UpperCase',
    'strip_tags'    => 'StripTags',
];
