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
//  'rule' => vendor\package\Validate\Rules\RuleType\RuleName::class,
//
//  If your rule has aliases, you need to register the alias inside '/config/rules_aliases.php'. More details are inside
//  the rules_aliases file.
//
//----------------------------------------------------------------------------------------------------------------------
//                             Did you add a new rule? Please submit it to the repository!
//----------------------------------------------------------------------------------------------------------------------

return [
    /*----[ Basic validation ]----------------------------------------------------------------------------------------*/
    'required'                  => mikevandiepen\utility\Validate\Rules\Basic\Required::class,

    /*----[ Types validation ]----------------------------------------------------------------------------------------*/
    'numeric'                   => mikevandiepen\utility\Validate\Rules\Types\TypeNumeric::class,
    'boolean'                   => mikevandiepen\utility\Validate\Rules\Types\TypeBoolean::class,
    'float'                     => mikevandiepen\utility\Validate\Rules\Types\TypeFloat::class,
    'integer'                   => mikevandiepen\utility\Validate\Rules\Types\TypeInteger::class,
    'null'                      => mikevandiepen\utility\Validate\Rules\Types\TypeNull::class,
    'string'                    => mikevandiepen\utility\Validate\Rules\Types\TypeString::class,
    'array'                     => mikevandiepen\utility\Validate\Rules\Types\TypeArray::class,

    /*----[ Date validation ]-----------------------------------------------------------------------------------------*/
    'before_date'               => mikevandiepen\utility\Validate\Rules\Date\DateBefore::class,
    'after_date'                => mikevandiepen\utility\Validate\Rules\Date\DateAfter::class,
    'between_date'              => mikevandiepen\utility\Validate\Rules\Date\DateBetween::class,

    /*----[ String validation ]---------------------------------------------------------------------------------------*/
    'starts_with'               => mikevandiepen\utility\Validate\Rules\String\StartsWith::class,
    'ends_with'                 => mikevandiepen\utility\Validate\Rules\String\EndsWith::class,
    'contains'                  => mikevandiepen\utility\Validate\Rules\String\Contains::class,
    'regular_expresion'         => mikevandiepen\utility\Validate\Rules\String\Regex::class,
    'exact_length'              => mikevandiepen\utility\Validate\Rules\String\ExactLength::class,
    'min_length'                => mikevandiepen\utility\Validate\Rules\String\MinLength::class,
    'max_length'                => mikevandiepen\utility\Validate\Rules\String\MaxLength::class,
    'email'                     => mikevandiepen\utility\Validate\Rules\String\Email::class,
    'url'                       => mikevandiepen\utility\Validate\Rules\String\Url::class,
    'domain'                    => mikevandiepen\utility\Validate\Rules\String\Domain::class,
    'ip_address'                => mikevandiepen\utility\Validate\Rules\String\IPAddress::class,
    'ipv4_address'              => mikevandiepen\utility\Validate\Rules\String\IPv4Address::class,
    'ipv6_address'              => mikevandiepen\utility\Validate\Rules\String\IPv6Address::class,
    'mac_address'               => mikevandiepen\utility\Validate\Rules\String\MacAddress::class,

    /*----[ Numeric validation ]--------------------------------------------------------------------------------------*/
    'between'                   => mikevandiepen\utility\Validate\Rules\Numeric\Between::class,
    'minimum'                   => mikevandiepen\utility\Validate\Rules\Numeric\Min::class,
    'maximum'                   => mikevandiepen\utility\Validate\Rules\Numeric\Max::class,
    'equals_to'                 => mikevandiepen\utility\Validate\Rules\Numeric\Equal::class,
    'not_equal_to'              => mikevandiepen\utility\Validate\Rules\Numeric\NotEqual::class,
    'greater_than'              => mikevandiepen\utility\Validate\Rules\Numeric\GreaterThan::class,
    'greater_than_or_equal_to'  => mikevandiepen\utility\Validate\Rules\Numeric\GreaterThanOrEqualTo::class,
    'less_than'                 => mikevandiepen\utility\Validate\Rules\Numeric\LessThan::class,
    'less_than_or_equal_to'     => mikevandiepen\utility\Validate\Rules\Numeric\LessThanOrEqualTo::class,

    /*----[ File validation ]-----------------------------------------------------------------------------------------*/
    'allowed_extensions'        => mikevandiepen\utility\Validate\Rules\File\AllowedExtensions::class,
    'allowed_mime_types'        => mikevandiepen\utility\Validate\Rules\File\AllowedMimeTypes::class,
    'max_file_size'             => mikevandiepen\utility\Validate\Rules\File\MaxFileSize::class,

    /*----[ Email validation ]----------------------------------------------------------------------------------------*/
    'allowed_email_providers'   => mikevandiepen\utility\Validate\Rules\Email\AllowedProviders::class,
    'blocked_email_providers'   => mikevandiepen\utility\Validate\Rules\Email\BlockedProviders::class,

    /*----[ Payment validation ]--------------------------------------------------------------------------------------*/
    'credit_card'               => mikevandiepen\utility\Validate\Rules\Payment\CreditCard::class,
    'iban'                      => mikevandiepen\utility\Validate\Rules\Payment\IBAN::class,

    //------------------------------------------------------------------------------------------------------------------
    //                             Please register your custom validation rules down bellow
    //------------------------------------------------------------------------------------------------------------------
];
