<?php
//----------------------------------------------------------------------------------------------------------------------
//                                       How to register your new sanitization filter
//----------------------------------------------------------------------------------------------------------------------
//
//  For each new filter your create you need to add the configuration here.
//  If the filter is not registered it can not be used.
//  The values you have to fill are:
//  - filter_alias  (The alias for an existing rule)
//  - filter_name   (The filter name which alias is an alias from)
//
//  Structure:
//  [
//      'alias' => 'filter_name' (As in config/filters.php)
//  ]
//
//  If your filter has aliases, you need to register the alias inside '/config/filters_aliases.php'. More details are inside
//  the filters_aliases file.
//
//----------------------------------------------------------------------------------------------------------------------
//                          Did you add a new translation? Please submit it to the repository!
//----------------------------------------------------------------------------------------------------------------------

return [
    // filter_alias  => filter_name
    'encode_json'   => 'json_encode',
    'decode_json'   => 'json_decode',
    'trim'          => 'trim_all',
    'ltrim'         => 'left_trim',
    'trim_left'     => 'left_trim',
    'rtrim'         => 'right_trim',
    'trim_right'    => 'right_trim',
    'upper'         => 'uppercase',
    'lower'         => 'lowercase',
    'slug'          => 'slugify',
    'to_slug'       => 'slugify',
    'tags'          => 'strip_tags',
    // Add your custom aliases below:
];
