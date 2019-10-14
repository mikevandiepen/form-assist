<?php

// Loading all base files
require_once __DIR__ . '/vendor/mikevandiepen/response/src/Response.php';
require_once('./src/Sanitize/SanitizationInterface.php');
require_once('./src/Validate/ValidationInterface.php');
require_once('./src/Validate/TranslationTrait.php');
function _require_all($dir, $depth=0) {

    // require all php files
    foreach (glob("$dir/*") as $path) {

        if (preg_match('/\.php$/', $path)) {
            require_once $path;
        }

    elseif (is_dir($path)) {
            _require_all($path, $depth+1);
        }
    }
}
_require_all('./src');

// Actually testing the code
use mikevandiepen\utility\Form;
$link = ''; // This should be your mysql connection

$_POST = [
    'currency'  => 'USD',
    'email'     => 'mike.vandiepen@hotmail.com'
];

$clean = Form::sanitize($_POST, [
    'currency'  => 'sql|xss|trim',
    'email'     => 'sql|xss|trim',
], $link);

$valid = Form::validate($clean, [
    'currency'  => 'required',
    'email'     => 'required',
]);
