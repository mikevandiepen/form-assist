<?php

// Post data
$_POST = [
    'first_name'    => 'John',
    'last_name'     => 'Smith',
    'address'       => 'Main street 102, Hampshire England'
];

// Cleaning the input and applying the sanitization rules per field.
$clean = Form::sanitize($_POST, [
    'first_name'    => 'sql|xss|trim',
    'last_name'     => 'sql|xss|trim',
    'address'       => 'sql|xss|trim',
]);

// Using the cleaned results
$cleanFirstName = $clean['first_name'];
