<?php
//----------------------------------------------------------------------------------------------------------------------
//                                        How to implement parameters
//----------------------------------------------------------------------------------------------------------------------
//
//  List of parameters:
//
//  {%attribute%}:      The field / attribute
//  {%value%}:          The value of the field
//  {%threshold%}:      The threshold of the validation rule
//----------------------------------------------------------------------------------------------------------------------
//
//  If your rule has multiple Thresholds or values, the parameters will go as the following:
//
//  {%value_1%}:        The first value of the field (Increments)
//  {%threshold_1%}:    The first threshold of the field (Increments)
//
//----------------------------------------------------------------------------------------------------------------------
//
//  If you have a new custom rule and you want to add a translation for it;
//  set-up the translation string as the following:
//
//  'rule_name' => [
//         'default'   => '',
//         'en_US'     => '',
//         'en_UK'     => '',
//         'es_ES'     => '',
//         'it_IT'     => '',
//         'fr_FR'     => '',
//         'nl_NL'     => '',
//         'no_NO'     => '',
//         'pl_PL'     => '',
//         'pt_PT'     => '',
//         'ru_RU'     => '',
//         'sv_SE'     => '',
//     ],
//
//----------------------------------------------------------------------------------------------------------------------
//                      Did you add a new translation? Please submit it to the repository!
//----------------------------------------------------------------------------------------------------------------------

return [
    'required' => [
        'default'   => 'Field: {%attribute%} is required!',
        'en_US'     => 'Field: {%attribute%} is required!',
        'en_UK'     => 'Field: {%attribute%} is required!',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'numeric' => [
        'default'   => 'Field: {%attribute%} must be a numeric value!',
        'en_US'     => 'Field: {%attribute%} must be a numeric value!',
        'en_UK'     => 'Field: {%attribute%} must be a numeric value!',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'float' => [
        'default'   => 'Field: {%attribute%} must be a float!',
        'en_US'     => 'Field: {%attribute%} must be a float!',
        'en_UK'     => 'Field: {%attribute%} must be a float!',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'boolean' => [
        'default'   => 'Field: {%attribute%} must be true or false!',
        'en_US'     => 'Field: {%attribute%} must be true or false!',
        'en_UK'     => 'Field: {%attribute%} must be true or false!',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'integer' => [
        'default'   => 'Field: {%attribute%} must be an integer!',
        'en_US'     => 'Field: {%attribute%} must be an integer!',
        'en_UK'     => 'Field: {%attribute%} must be an integer!',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'null' => [
        'default'   => 'Field: {%attribute%} must be null!',
        'en_US'     => 'Field: {%attribute%} must be null!',
        'en_UK'     => 'Field: {%attribute%} must be null!',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'string' => [
        'default'   => 'Field: {%attribute%} must be a string!',
        'en_US'     => 'Field: {%attribute%} must be a string!',
        'en_UK'     => 'Field: {%attribute%} must be a string!',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'array' => [
        'default'   => 'Field: {%attribute%} must be an array!',
        'en_US'     => 'Field: {%attribute%} must be an array!',
        'en_UK'     => 'Field: {%attribute%} must be an array!',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'before_date' => [
        'default'   => 'Field: {%attribute%} must be earlier then {%threshold%}. Your value: {%value%}.',
        'en_US'     => 'Field: {%attribute%} must be earlier then {%threshold%}. Your value: {%value%}.',
        'en_UK'     => 'Field: {%attribute%} must be earlier then {%threshold%}. Your value: {%value%}.',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'after_date' => [
        'default'   => 'Field: {%attribute%} must be later then {%threshold%}. Your value: {%value%}.',
        'en_US'     => 'Field: {%attribute%} must be later then {%threshold%}. Your value: {%value%}.',
        'en_UK'     => 'Field: {%attribute%} must be later then {%threshold%}. Your value: {%value%}.',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'between_date' => [
        'default'   => 'Field: {%attribute%} must be between {%threshold1%} and {%threshold2%}. Your value: {%value%}.',
        'en_US'     => 'Field: {%attribute%} must be between {%threshold1%} and {%threshold2%}. Your value: {%value%}.',
        'en_UK'     => 'Field: {%attribute%} must be between {%threshold1%} and {%threshold2%}. Your value: {%value%}.',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'starts_with' => [
        'default'   => 'Field: {%attribute%} must start with {%threshold%}. Your value: {%value%}.',
        'en_US'     => 'Field: {%attribute%} must start with {%threshold%}. Your value: {%value%}.',
        'en_UK'     => 'Field: {%attribute%} must start with {%threshold%}. Your value: {%value%}.',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'ends_with' => [
        'default'   => 'Field: {%attribute%} must ends with {%threshold%}. Your value: {%value%}.',
        'en_US'     => 'Field: {%attribute%} must ends with {%threshold%}. Your value: {%value%}.',
        'en_UK'     => 'Field: {%attribute%} must ends with {%threshold%}. Your value: {%value%}.',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'contains' => [
        'default'   => 'Field: {%attribute%} must contain the substring {%threshold%}. Your value: {%value%}.',
        'en_US'     => 'Field: {%attribute%} must contain the substring {%threshold%}. Your value: {%value%}.',
        'en_UK'     => 'Field: {%attribute%} must contain the substring {%threshold%}. Your value: {%value%}.',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'regular_expresion' => [
        'default'   => 'Field: {%attribute%} must match this regular expression pattern: {%threshold%}.',
        'en_US'     => 'Field: {%attribute%} must match this regular expression pattern: {%threshold%}.',
        'en_UK'     => 'Field: {%attribute%} must match this regular expression pattern: {%threshold%}.',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'exact_length' => [
        'default'   => 'Field: {%attribute%} must have an exact length of {%threshold%}. Length of your string: {%value%}.',
        'en_US'     => 'Field: {%attribute%} must have an exact length of {%threshold%}. Length of your string: {%value%}.',
        'en_UK'     => 'Field: {%attribute%} must have an exact length of {%threshold%}. Length of your string: {%value%}.',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'minimum_length' => [
        'default'   => 'Field: {%attribute%} must have a minimum length of {%threshold%}. Length of your string: {%value%}.',
        'en_US'     => 'Field: {%attribute%} must have a minimum length of {%threshold%}. Length of your string: {%value%}.',
        'en_UK'     => 'Field: {%attribute%} must have a minimum length of {%threshold%}. Length of your string: {%value%}.',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'maximum_length' => [
        'default'   => 'Field: {%attribute%} must have a maximum length of {%threshold%}. Length of your string: {%value%}.',
        'en_US'     => 'Field: {%attribute%} must have a maximum length of {%threshold%}. Length of your string: {%value%}.',
        'en_UK'     => 'Field: {%attribute%} must have a maximum length of {%threshold%}. Length of your string: {%value%}.',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'email' => [
        'default'   => 'Field: {%attribute%} is not a valid email address!',
        'en_US'     => 'Field: {%attribute%} is not a valid email address!',
        'en_UK'     => 'Field: {%attribute%} is not a valid email address!',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'url' => [
        'default'   => 'Field: {%attribute%} is not a valid URL address!',
        'en_US'     => 'Field: {%attribute%} is not a valid URL address!',
        'en_UK'     => 'Field: {%attribute%} is not a valid URL address!',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'domain' => [
        'default'   => 'Field: {%attribute%} must be a valid domain!',
        'en_US'     => 'Field: {%attribute%} must be a valid domain!',
        'en_UK'     => 'Field: {%attribute%} must be a valid domain!',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'ip_address' => [
        'default'   => 'Field: {%attribute%} must be a valid IP address!',
        'en_US'     => 'Field: {%attribute%} must be a valid IP address!',
        'en_UK'     => 'Field: {%attribute%} must be a valid IP address!',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'ipv4_address' => [
        'default'   => 'Field: {%attribute%} must be a valid IPv4 address!',
        'en_US'     => 'Field: {%attribute%} must be a valid IPv4 address!',
        'en_UK'     => 'Field: {%attribute%} must be a valid IPv4 address!',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'ipv6_address' => [
        'default'   => 'Field: {%attribute%} must be a valid IPv6 address!',
        'en_US'     => 'Field: {%attribute%} must be a valid IPv6 address!',
        'en_UK'     => 'Field: {%attribute%} must be a valid IPv6 address!',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'mac_address' => [
        'default'   => 'Field: {%attribute%} must be a valid MAC address!',
        'en_US'     => 'Field: {%attribute%} must be a valid MAC address!',
        'en_UK'     => 'Field: {%attribute%} must be a valid MAC address!',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'between' => [
        'default'   => 'Field: {%attribute%} must be between {%threshold1%} and {%threshold2%}. Your value: {%value%}.',
        'en_US'     => 'Field: {%attribute%} must be between {%threshold1%} and {%threshold2%}. Your value: {%value%}.',
        'en_UK'     => 'Field: {%attribute%} must be between {%threshold1%} and {%threshold2%}. Your value: {%value%}.',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'minimum' => [
        'default'   => 'Field: {%attribute%} must have a minimum worth of {%threshold%}. Your value: {%value%}.',
        'en_US'     => 'Field: {%attribute%} must have a minimum worth of {%threshold%}. Your value: {%value%}.',
        'en_UK'     => 'Field: {%attribute%} must have a minimum worth of {%threshold%}. Your value: {%value%}.',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'maximum' => [
        'default'   => 'Field: {%attribute%} must have a maximum worth of {%threshold%}. Your value: {%value%}.',
        'en_US'     => 'Field: {%attribute%} must have a maximum worth of {%threshold%}. Your value: {%value%}.',
        'en_UK'     => 'Field: {%attribute%} must have a maximum worth of {%threshold%}. Your value: {%value%}.',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'equals_to' => [
        'default'   => 'Field: {%attribute%} must be equal to {%threshold%}. Your value: {%value%}.',
        'en_US'     => 'Field: {%attribute%} must be equal to {%threshold%}. Your value: {%value%}.',
        'en_UK'     => 'Field: {%attribute%} must be equal to {%threshold%}. Your value: {%value%}.',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'not_equal_to' => [
        'default'   => 'Field: {%attribute%} must not be equal to {%threshold%}. Your value: {%value%}.',
        'en_US'     => 'Field: {%attribute%} must not be equal to {%threshold%}. Your value: {%value%}.',
        'en_UK'     => 'Field: {%attribute%} must not be equal to {%threshold%}. Your value: {%value%}.',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'greater_than' => [
        'default'   => 'Field: {%attribute%} must be greater than to {%threshold%}. Your value: {%value%}.',
        'en_US'     => 'Field: {%attribute%} must be greater than to {%threshold%}. Your value: {%value%}.',
        'en_UK'     => 'Field: {%attribute%} must be greater than to {%threshold%}. Your value: {%value%}.',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'greater_than_or_equal_to' => [
        'default'   => 'Field: {%attribute%} must be greater or equal to {%threshold%}. Your value: {%value%}.',
        'en_US'     => 'Field: {%attribute%} must be greater or equal to {%threshold%}. Your value: {%value%}.',
        'en_UK'     => 'Field: {%attribute%} must be greater or equal to {%threshold%}. Your value: {%value%}.',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'less_than' => [
        'default'   => 'Field: {%attribute%} must be less to {%threshold%}. Your value: {%value%}.',
        'en_US'     => 'Field: {%attribute%} must be less to {%threshold%}. Your value: {%value%}.',
        'en_UK'     => 'Field: {%attribute%} must be less to {%threshold%}. Your value: {%value%}.',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'less_than_or_equal_to' => [
        'default'   => 'Field: {%attribute%} must be lesser than or equal to {%threshold%}. Your value: {%value%}.',
        'en_US'     => 'Field: {%attribute%} must be lesser than or equal to {%threshold%}. Your value: {%value%}.',
        'en_UK'     => 'Field: {%attribute%} must be lesser than or equal to {%threshold%}. Your value: {%value%}.',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'allowed_extensions' => [
        'default'   => 'Invalid file type! Your file must be of type {%threshold_list%}. Your file type: {%value%}.',
        'en_US'     => 'Invalid file type! Your file must be of type {%threshold_list%}. Your file type: {%value%}.',
        'en_UK'     => 'Invalid file type! Your file must be of type {%threshold_list%}. Your file type: {%value%}.',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'allowed_mime_types' => [
        'default'   => 'Invalid file type! Your file must be of type {%threshold_list%}. Your file type: {%value%}.',
        'en_US'     => 'Invalid file type! Your file must be of type {%threshold_list%}. Your file type: {%value%}.',
        'en_UK'     => 'Invalid file type! Your file must be of type {%threshold_list%}. Your file type: {%value%}.',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'max_file_size' => [
        'default'   => 'File too large! The size of your file may not be greater than {%threshold%}. File size: {%value%}.',
        'en_US'     => 'File too large! The size of your file may not be greater than {%threshold%}. File size: {%value%}.',
        'en_UK'     => 'File too large! The size of your file may not be greater than {%threshold%}. File size: {%value%}.',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'allowed_email_providers' => [
        'default'   => 'Sorry, we only allow email addresses from these provider(s): {%threshold_list%}.',
        'en_US'     => 'Sorry, we only allow email addresses from these provider(s): {%threshold_list%}.',
        'en_UK'     => 'Sorry, we only allow email addresses from these provider(s): {%threshold_list%}.',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'blocked_email_providers' => [
        'default'   => 'Sorry, the email provider {%value%} has been blocked!',
        'en_US'     => 'Sorry, the email provider {%value%} has been blocked!',
        'en_UK'     => 'Sorry, the email provider {%value%} has been blocked!',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'credit_card' => [
        'default'   => 'Sorry, the credit-card number you have entered is not valid.',
        'en_US'     => 'Sorry, the credit-card number you have entered is not valid.',
        'en_UK'     => 'Sorry, the credit-card number you have entered is not valid.',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    'iban' => [
        'default'   => 'Sorry, the IBAN number you have entered is not valid.',
        'en_US'     => 'Sorry, the IBAN number you have entered is not valid.',
        'en_UK'     => 'Sorry, the IBAN number you have entered is not valid.',
        'es_ES'     => '',
        'it_IT'     => '',
        'fr_FR'     => '',
        'nl_NL'     => '',
        'no_NO'     => '',
        'pl_PL'     => '',
        'pt_PT'     => '',
        'ru_RU'     => '',
        'sv_SE'     => '',
    ],

    // Enter your new rule here!
    // If your rule has aliases, please register the aliases inside `config/alias.php`
];
