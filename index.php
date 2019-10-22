<?php
// Loading all base files
require_once __DIR__ . '/vendor/mikevandiepen/response/src/Response.php';
require_once('./src/Sanitize/SanitizationInterface.php');
require_once('./src/Validate/ValidationInterface.php');
require_once('./src/Validate/Rules/Rule.php');
require_once('./src/Validate/Traits/ExtractDomainTrait.php');

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
use \mikevandiepen\utility\Response;
use mikevandiepen\utility\Form;


$_POST = [
    'currency'  => 'EUR',
    'email'     => 'mike.vandiepen@hotmail.com'
];
//
// Backend validation
$clean = Form::sanitize($_POST, [
    'currency'  => 'sql|xss|trim',
    'email'     => 'sql|xss|trim',
]);

Form::validate($clean, [
    'currency'  => 'required|string|min_length:10',
    'email'     => 'required|email',
]);


if (Form::validationPasses()) {
    // Execute the code where you'd like to proceed with
    print 'Validation passed!' . PHP_EOL;
} else {
    $response = Form::validationResponse();
    print_r($response);
}