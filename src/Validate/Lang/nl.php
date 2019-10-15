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
    // Basic validation
    'required'                          => 'Veld: {%attr%} is verplicht!',
    // Type validation
    'type_string'                       => 'Veld: {%attr%} moet een tekst zijn!',
    'type_float'                        => 'Veld: {%attr%} moet een float zijn!',
    'type_integer'                      => 'Veld: {%attr%} moet een numerieke waarde hebben!',
    'type_boolean'                      => 'Veld: {%attr%} moet een boolean zijn!',
    'type_numeric'                      => 'Veld: {%attr%} moet een numerieke waarde hebben!',
    'type_array'                        => 'Veld: {%attr%} moet een array zijn!',
    'type_null'                         => 'Veld: {%attr%} moet null zijn!',
    // Date validation
    'date_after'                        => 'Veld: {%attr%} moet be later then {%threshold%}. Wat jij hebt ingevuld: {%value%}.',
    'date_before'                       => 'Veld: {%attr%} moet be earlier then {%threshold%}. Wat jij hebt ingevuld: {%value%}.',
    'date_between'                      => 'Veld: {%attr%} moet be between {%threshold1%} and {%threshold2%}. Wat jij hebt ingevuld: {%value%}.',
    // Numeric validation
    'numeric_min'                       => 'Veld: {%attr%} moet een maximale waarde van {%threshold%} hebben. Wat jij hebt ingevuld: {%value%}.',
    'numeric_max'                       => 'Veld: {%attr%} moet een minimale waarde van {%threshold%} hebben. Wat jij hebt ingevuld: {%value%}.',
    'numeric_between'                   => 'Veld: {%attr%} moet tussen {%threshold1%} en {%threshold2%} vallen. Wat jij hebt ingevuld: {%value%}.',
    'numeric_equal'                     => 'Veld: {%attr%} moet gelijk zijn aan {%threshold%}. Wat jij hebt ingevuld: {%value%}',
    'numeric_not_equal'                 => 'Veld: {%attr%} moet niet gelijk zijn aan {%threshold%}. Wat jij hebt ingevuld: {%value%}',
    'numeric_greater_than'              => 'Veld: {%attr%} moet groter zijn dan {%threshold%}. Wat jij hebt ingevuld: {%value%}',
    'numeric_greater_than_or_equal_to'  => 'Veld: {%attr%} moet groter of gelijk zijn aan {%threshold%}. Wat jij hebt ingevuld: {%value%}',
    'numeric_less_than'                 => 'Veld: {%attr%} moet minder zijn dan {%threshold%}. Wat jij hebt ingevuld: {%value%}',
    'numeric_less_than_or_equal_to'     => 'Veld: {%attr%} moet minder of gelijk zijn aan {%threshold%}. Wat jij hebt ingevuld: {%value%}',
    // String validation
    'min_length'                        => 'Veld: {%attr%} moet een minimale lengte hebben van {%threshold%}. Wat jij hebt ingevuld: {%value%}.',
    'max_length'                        => 'Veld: {%attr%} moet een maximale lengte hebben van {%threshold%}. Wat jij hebt ingevuld: {%value%}.',
    'exact_length'                      => 'Veld: {%attr%} moet een exacte lengte hebben van {%threshold%}. Wat jij hebt ingevuld: {%value%}.',
    'starts_with'                       => 'Veld: {%attr%} moet start met {%threshold%}. Wat jij hebt ingevuld: {%value%}',
    'ends_with'                         => 'Veld: {%attr%} moet eindigt op {%threshold%}. Wat jij hebt ingevuld: {%value%}',
    'contains'                          => 'Veld: {%attr%} moet de tekst {%threshold%} bevatten. Wat jij hebt ingevuld: {%value%}',
    'regex'                             => 'Veld: {%attr%} moet dit regex patroon volgen: {%threshold%}.',
    'email'                             => 'Veld: {%attr%} moet een email zijn!',
    'url'                               => 'Veld: {%attr%} moet een url zijn!',
    'domain'                            => 'Veld: {%attr%} moet een domain zijn!',
    'numeric'                           => 'Veld: {%attr%} moet numerieke waarde hebben!',
    'ip_address'                        => 'Veld: {%attr%} moet een ip-adres zijn!',
    'mac_address'                       => 'Veld: {%attr%} moet een mac-adres zijn!',
    // File validation
    'file_max_size'                     => 'Het bestand is te groot! Je bestand mag niet groter zijn dan {%threshold%}. Jouw bestand: {%value%}.',
    'file_allowed_mime_type'            => 'Incorrect bestandstype! De bestand types die toegestaan zijn {%threshold_list%}. Jouw bestandstype: {%value%}.',
    'file_allowed_extensions'           => 'Incorrect bestandstype! De bestand types die toegestaan zijn {%threshold_list%}. Jouw bestandstype: {%value%}.',
    // File validation
    'file_max_size'                     => 'File too large! The size of your file may not be greater than {%threshold%}. File size: {%value%}.',
    'file_allowed_mime_type'            => 'Invalid file type! Your file must be of type {%threshold_list%}. Your file type: {%value%}.',
    'file_allowed_extensions'           => 'Invalid file type! Your file must be of type {%threshold_list%}. Your file type: {%value%}.',
    // Add your custom rules below.
];