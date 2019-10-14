<?php

use mikevandiepen\utility\Form;
$link = ''; // This should be your mysql connection

$clean = Form::Sanitize($_POST, [
    'currency'  => 'sql|xss|trim',
    'email'     => 'sql|xss|trim|email',
], $link);

$valid = Form::validate($clean, [
    'currency'  => 'required|starts_with:eur|max_length:6',
    'email'     => 'required|email',
]);