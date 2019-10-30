<?php
//----------------------------------------------------------------------------------------------------------------------
//                                       How to register your new validation rule
//----------------------------------------------------------------------------------------------------------------------
//
//  For each new rule your create you need to add the configuration here.
//  If the rule is not registered it can not be used.
//  The values you have to fill are:
//      - rule (Generally how your rule is named, the translations will be looked up according to this name)
//      - type (The rule type, in this example Basic. Which means the folder the class is in, is inside: 'Rules/Basic/')
//      - class (The classname of the validation rule)
//
//  Structure:
//  'rule' => [
//      'category'  => 'Basic',
//      'class'     => 'Required'
//  ],
//
//  If your rule has aliases, you need to register the alias inside '/config/rules_aliases.php'. More details are inside
//  the rules_aliases file.
//
//----------------------------------------------------------------------------------------------------------------------
//                          Did you add a new translation? Please submit it to the repository!
//----------------------------------------------------------------------------------------------------------------------

return [
    'required' => [
        'category'  => 'Basic',
        'class'     => 'Required'
    ],

    'numeric' => [
        'category'  => 'Types',
        'class'     => 'TypeNumeric'
    ],

    'boolean' => [
        'category'  => 'Types',
        'class'     => 'TypeBoolean'
    ],

    'float' => [
        'category'  => 'Types',
        'class'     => 'TypeFloat'
    ],

    'integer' => [
        'category'  => 'Types',
        'class'     => 'TypeInteger'
    ],

    'null' => [
        'category'  => 'Types',
        'class'     => 'TypeNull'
    ],

    'string' => [
        'category'  => 'Types',
        'class'     => 'TypeString'
    ],

    'array' => [
        'category'  => 'Types',
        'class'     => 'TypeArray'
    ],

    'before_date' => [
        'category'  => 'Date',
        'class'     => 'DateAfter'
    ],

    'after_date' => [
        'category'  => 'Date',
        'class'     => 'DateBefore'
    ],

    'between_date' => [
        'category'  => 'Date',
        'class'     => 'DateBetween'
    ],

    'starts_with' => [
        'category'  => 'String',
        'class'     => 'StartsWith'
    ],

    'ends_with' => [
        'category'  => 'String',
        'class'     => 'EndsWith'
    ],

    'contains' => [
        'category'  => 'String',
        'class'     => 'Contains'
    ],

    'regular_expresion' => [
        'category'  => 'String',
        'class'     => 'Regex'
    ],

    'exact_length' => [
        'category'  => 'String',
        'class'     => 'ExactLength'
    ],

    'min_length' => [
        'category'  => 'String',
        'class'     => 'MinLength'
    ],

    'max_length' => [
        'category'  => 'String',
        'class'     => 'MaxLength'
    ],

    'email' => [
        'category'  => 'String',
        'class'     => 'Email'
    ],

    'url' => [
        'category'  => 'String',
        'class'     => 'Url'
    ],

    'domain' => [
        'category'  => 'String',
        'class'     => 'Domain'
    ],

    'ip_address' => [
        'category'  => 'String',
        'class'     => 'IPAddress'
    ],

    'ipv4_address' => [
        'category'  => 'String',
        'class'     => 'IPv4Address'
    ],

    'ipv6_address' => [
        'category'  => 'String',
        'class'     => 'IPv6Address'
    ],

    'mac_address' => [
        'category'  => 'String',
        'class'     => 'MacAddress'
    ],

    'between' => [
        'category'  => 'Numeric',
        'class'     => 'Between'
    ],

    'minimum' => [
        'category'  => 'Numeric',
        'class'     => 'Min'
    ],

    'maximum' => [
        'category'  => 'Numeric',
        'class'     => 'Max'
    ],

    'equals_to' => [
        'category'  => 'Numeric',
        'class'     => 'Equal'
    ],

    'not_equal_to' => [
        'category'  => 'Numeric',
        'class'     => 'NotEqual'
    ],

    'greater_than' => [
        'category'  => 'Numeric',
        'class'     => 'GreaterThan'
    ],

    'greater_than_or_equal_to' => [
        'category'  => 'Numeric',
        'class'     => 'GreaterThanOrEqualTo'
    ],

    'less_than' => [
        'category'  => 'Numeric',
        'class'     => 'LessThan'
    ],

    'less_than_or_equal_to' => [
        'category'  => 'Numeric',
        'class'     => 'LessThanOrEqualTo'
    ],

    'allowed_extensions' => [
        'category'  => 'File',
        'class'     => 'AllowedExtensions'
    ],

    'allowed_mime_types' => [
        'category'  => 'File',
        'class'     => 'AllowedMimeTypes'
    ],

    'max_file_size' => [
        'category'  => 'File',
        'class'     => 'MaxFileSize'
    ],

    'allowed_email_providers' => [
        'category'  => 'Email',
        'class'     => 'AllowedProviders'
    ],

    'blocked_email_providers' => [
        'category'  => 'Email',
        'class'     => 'BlockedProviders'
    ],

    'credit_card' => [
        'category'  => 'Payment',
        'class'     => 'CreditCard'
    ],

    'iban' => [
        'category'  => 'Payment',
        'class'     => 'IBAN'
    ],
];
