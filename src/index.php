<?php

use mikevandiepen\utility\Form;

$data = Form::Sanitize($_POST, [
      $_POST['field']   => 'sql|xss|trim',
      $_POST['field2']  => 'sql|xss|trim',
]);