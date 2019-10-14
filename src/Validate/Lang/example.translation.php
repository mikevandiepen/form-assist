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
    // Date rules
    'date_after'    => '',
    'date_before'   => '',
    'date_between'  => '',

    // Numeric rules
    'validate_bool'                     => '',
    'validate_float'                    => '',
    'numeric'                           => '',
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
    'url'           => '',
    'email'         => '',
    'domain'        => '',
    'ip_address'    => '',
    'mac_address'   => '',
];