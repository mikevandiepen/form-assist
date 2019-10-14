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
    'required'      => 'Field: {%attr%} is required!',
    'string'        => 'Field: {%attr%} must be a string!',
    'float'         => 'Field: {%attr%} must be a float!',
    'int'           => 'Field: {%attr%} must be a integer!',
    'bool'          => 'Field: {%attr%} must be a boolean!',
    'email'         => 'Field: {%attr%} must be an email!',
    'url'           => 'Field: {%attr%} must be a url!',
    'domain'        => 'Field: {%attr%} must be a domain!',
    'numeric'       => 'Field: {%attr%} must be a numeric value!',
    'ip_address'    => 'Field: {%attr%} must be an ip-address!',
    'mac_address'   => 'Field: {%attr%} must be a mac-address!',

    // Date rules
    'date_after'    => 'Invalid field: {%attr%} must be later then {%threshold%}. Your value: {%value%}.',
    'date_before'   => 'Invalid field: {%attr%} must be earlier then {%threshold%}. Your value: {%value%}.',
    'date_between'  => 'Invalid field: {%attr%} must be between {%threshold1%} and {%threshold2%}. Your value: {%value%}.',

    // Numeric rules
    'numeric_min'                       => '',
    'numeric_max'                       => '',
    'numeric_between'                   => '',
    'numeric_equal'                     => '',
    'numeric_not_equal'                 => '',
    'numeric_greater_than'              => '',
    'numeric_greater_than_or_equal_to'  => '',
    'numeric_less_than'                 => '',
    'numeric_less_than_or_equal_to'     => '',

    // String rules
    'min_length'    => '',
    'max_length'    => '',
    'starts_with'   => '',
    'ends_with'     => '',
    'contains'      => '',
    'regex'         => '',
];