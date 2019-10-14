<?php

use mikevandiepen\utility\Form;

$clean = Form::Sanitize($_POST, [
    $_POST['field']     => 'sql|xss|trim',
    $_POST['field2']    => 'sql|xss|trim',
]);

$valid = Form::validate($clean, [
    $clean['field']     => 'string',
    $clean['field2']    => '',
]);