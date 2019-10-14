<?php

//----------------------------------------------------------------------------------------------------------------------
//                                        How to implement parameters
//----------------------------------------------------------------------------------------------------------------------
//
//  List of parameters:
//
//  {%attr%}:       The field / attribute
//  {%value%}:      The value of the field
//  {%threshold%}:  The threshold of the validation rule
//----------------------------------------------------------------------------------------------------------------------
//
//  If your rule has multiple Thresholds or values, the parameters will go as follow:
//
//  {%value1%}:      The first value of the field (Increments)
//  {%threshold1%}:  The first threshold of the field (Increments)
//
//----------------------------------------------------------------------------------------------------------------------
//                      Is this a custom language file? Please submit it to the repository!
//----------------------------------------------------------------------------------------------------------------------

return [
    // Default rules
    'required'                          => 'Field: {%attr%} is required!',
    'type_string'                       => 'Field: {%attr%} must be a string!',
    'type_float'                        => 'Field: {%attr%} must be a float!',
    'type_integer'                      => 'Field: {%attr%} must be a integer!',
    'type_boolean'                      => 'Field: {%attr%} must be a boolean!',
    'type_numeric'                      => 'Field: {%attr%} must be a numeric value!',
    'type_array'                        => 'Field: {%attr%} must be an array!',
    'type_null'                         => 'Field: {%attr%} must be null!',
    'regex'                             => 'Field: {%attr%} must match this regex pattern: {%threshold%}.',
    'domain'                            => 'Field: {%attr%} must be a domain!',
    'contains'                          => 'Field: {%attr%} must contain the substring {%threshold%}. Your value: {%value%}',
    // String types
    'email'                             => 'Field: {%attr%} must be an email!',
    'url'                               => 'Field: {%attr%} must be a url!',
    'ip_address'                        => 'Field: {%attr%} must be an ip-address!',
    'mac_address'                       => 'Field: {%attr%} must be a mac-address!',
    // Date rules
    'date_after'                        => 'Field: {%attr%} must be later then {%threshold%}. Your value: {%value%}.',
    'date_before'                       => 'Field: {%attr%} must be earlier then {%threshold%}. Your value: {%value%}.',
    'date_between'                      => 'Field: {%attr%} must be between {%threshold1%} and {%threshold2%}. Your value: {%value%}.',
    // Numeric rules
    'numeric_min'                       => 'Field: {%attr%} must have a minimum worth of {%threshold%}. Your value: {%value%}.',
    'numeric_max'                       => 'Field: {%attr%} must have a maximum worth of {%threshold%}. Your value: {%value%}.',
    'numeric_between'                   => 'Field: {%attr%} must be between {%threshold1%} and {%threshold2%}. Your value: {%value%}.',
    'numeric_equal'                     => 'Field: {%attr%} must be equal to {%threshold%}. Your value: {%value%}',
    'numeric_not_equal'                 => 'Field: {%attr%} must not be equal to {%threshold%}. Your value: {%value%}',
    'numeric_greater_than'              => 'Field: {%attr%} must be greater than to {%threshold%}. Your value: {%value%}',
    'numeric_greater_than_or_equal_to'  => 'Field: {%attr%} must be greater or equal to {%threshold%}. Your value: {%value%}',
    'numeric_less_than'                 => 'Field: {%attr%} must be less to {%threshold%}. Your value: {%value%}',
    'numeric_less_than_or_equal_to'     => 'Field: {%attr%} must be lesser than or equal to {%threshold%}. Your value: {%value%}',
    // String rules
    'min_length'                        => 'Field: {%attr%} must have a minimum length of {%threshold%}. Your value: {%value%}.',
    'max_length'                        => 'Field: {%attr%} must have a maximum length of {%threshold%}. Your value: {%value%}.',
    'starts_with'                       => 'Field: {%attr%} must start with {%threshold%}. Your value: {%value%}',
    'ends_with'                         => 'Field: {%attr%} must ends with {%threshold%}. Your value: {%value%}',
    // Add your custom rules below.
];