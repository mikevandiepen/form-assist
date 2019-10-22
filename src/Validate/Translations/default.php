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
//  If you have a new custom rule and you want to add a translation for it; set-up the translation string as the following:
//
//  'rule' => 'translation string'
//
//----------------------------------------------------------------------------------------------------------------------
//                      Is this a custom language file? Please submit it to the repository!
//----------------------------------------------------------------------------------------------------------------------

return [
    // Default validation translations
    'required'                  => 'Field: {%attribute%} is required!',

    // Type validation translations
    'num'                       => 'Field: {%attribute%} must be a numeric value!',
    'numeric'                   => 'Field: {%attribute%} must be a numeric value!',

    'float'                     => 'Field: {%attribute%} must be a float!',

    'bool'                      => 'Field: {%attribute%} must be a boolean!',
    'boolean'                   => 'Field: {%attribute%} must be a boolean!',

    'int'                       => 'Field: {%attribute%} must be an integer!',
    'integer'                   => 'Field: {%attribute%} must be an integer!',

    'null'                      => 'Field: {%attribute%} must be null!',
    'string'                    => 'Field: {%attribute%} must be a string!',
    'array'                     => 'Field: {%attribute%} must be an array!',

    // Date validation translations
    'date_after'                => 'Field: {%attribute%} must be later then {%threshold%}. Your value: {%value%}.',
    'date_before'               => 'Field: {%attribute%} must be earlier then {%threshold%}. Your value: {%value%}.',
    'date_between'              => 'Field: {%attribute%} must be between {%threshold1%} and {%threshold2%}. Your value: {%value%}.',

    // String validation translations
    'min_length'                => 'Field: {%attribute%} must have a minimum length of {%threshold%}. Length of your string: {%value%}.',
    'max_length'                => 'Field: {%attribute%} must have a maximum length of {%threshold%}. Length of your string: {%value%}.',
    'exact_length'              => 'Field: {%attribute%} must have an exact length of {%threshold%}. Length of your string: {%value%}.',
    'starts_with'               => 'Field: {%attribute%} must start with {%threshold%}. Your value: {%value%}.',
    'ends_with'                 => 'Field: {%attribute%} must ends with {%threshold%}. Your value: {%value%}.',

    'contains'                  => 'Field: {%attribute%} must contain the substring {%threshold%}. Your value: {%value%}.',
    'regex'                     => 'Field: {%attribute%} must match this regex pattern: {%threshold%}.',

    'email'                     => 'Field: {%attribute%} must be an email!',
    'url'                       => '',
    'domain'                    => 'Field: {%attribute%} must be a domain!',

    'ip'                        => 'Field: {%attribute%} must be an ip-address!',
    'ip_address'                => 'Field: {%attribute%} must be an ip-address!',

    'mac'                       => 'Field: {%attribute%} must be a mac-address!',
    'mac_address'               => 'Field: {%attribute%} must be a mac-address!',

    // Numeric validation translations
    'between'                   => 'Field: {%attribute%} must be between {%threshold1%} and {%threshold2%}. Your value: {%value%}.',

    'min'                       => 'Field: {%attribute%} must have a minimum worth of {%threshold%}. Your value: {%value%}.',
    'minimum'                   => 'Field: {%attribute%} must have a minimum worth of {%threshold%}. Your value: {%value%}.',

    'max'                       => 'Field: {%attribute%} must have a maximum worth of {%threshold%}. Your value: {%value%}.',
    'maximum'                   => 'Field: {%attribute%} must have a maximum worth of {%threshold%}. Your value: {%value%}.',

    'equal'                     => 'Field: {%attribute%} must be equal to {%threshold%}. Your value: {%value%}.',
    'equals'                    => 'Field: {%attribute%} must be equal to {%threshold%}. Your value: {%value%}.',
    'equal_to'                  => 'Field: {%attribute%} must be equal to {%threshold%}. Your value: {%value%}.',
    'equals_to'                 => 'Field: {%attribute%} must be equal to {%threshold%}. Your value: {%value%}.',

    'not_equal'                 => 'Field: {%attribute%} must not be equal to {%threshold%}. Your value: {%value%}.',
    'not_equal_to'              => 'Field: {%attribute%} must not be equal to {%threshold%}. Your value: {%value%}.',

    'gt'                        => 'Field: {%attribute%} must be greater than to {%threshold%}. Your value: {%value%}.',
    'greater_than'              => 'Field: {%attribute%} must be greater than to {%threshold%}. Your value: {%value%}.',

    'gte'                       => 'Field: {%attribute%} must be greater or equal to {%threshold%}. Your value: {%value%}.',
    'greater_than_or_equal_to'  => 'Field: {%attribute%} must be greater or equal to {%threshold%}. Your value: {%value%}.',

    'lt'                        => 'Field: {%attribute%} must be less to {%threshold%}. Your value: {%value%}.',
    'less_than'                 => 'Field: {%attribute%} must be less to {%threshold%}. Your value: {%value%}.',

    'lte'                       => 'Field: {%attribute%} must be lesser than or equal to {%threshold%}. Your value: {%value%}.',
    'less_than_or_equal_to'     => 'Field: {%attribute%} must be lesser than or equal to {%threshold%}. Your value: {%value%}.',

    // File validation translations
    'max_size'                  => 'File too large! The size of your file may not be greater than {%threshold%}. File size: {%value%}.',
    'max_file_size'             => 'File too large! The size of your file may not be greater than {%threshold%}. File size: {%value%}.',

    'allowed_mime_type'         => 'Invalid file type! Your file must be of type {%threshold_list%}. Your file type: {%value%}.',
    'allowed_extensions'        => 'Invalid file type! Your file must be of type {%threshold_list%}. Your file type: {%value%}.',

    // Email validation translation
    'allowed_providers'         => 'Sorry, we only allow email addresses from these provider(s): {%threshold_list%}.',
    'allowed_email_providers'   => 'Sorry, we only allow email addresses from these provider(s): {%threshold_list%}.',

    'blocked_providers'         => 'Sorry, the email provider {%value%} has been blocked!',
    'blocked_email_providers'   => 'Sorry, the email provider {%value%} has been blocked!',
];