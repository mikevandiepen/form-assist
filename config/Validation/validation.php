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
    'required'                  => Mediadevs\FormAssist\Validate\Rules\Basic\Required::class,

    /*----[ Types validation ]----------------------------------------------------------------------------------------*/
    'numeric'                   => Mediadevs\FormAssist\Validate\Rules\Types\TypeNumeric::class,
    'boolean'                   => Mediadevs\FormAssist\Validate\Rules\Types\TypeBoolean::class,
    'float'                     => Mediadevs\FormAssist\Validate\Rules\Types\TypeFloat::class,
    'integer'                   => Mediadevs\FormAssist\Validate\Rules\Types\TypeInteger::class,
    'null'                      => Mediadevs\FormAssist\Validate\Rules\Types\TypeNull::class,
    'string'                    => Mediadevs\FormAssist\Validate\Rules\Types\TypeString::class,
    'array'                     => Mediadevs\FormAssist\Validate\Rules\Types\TypeArray::class,

    /*----[ Date validation ]-----------------------------------------------------------------------------------------*/
    'before_date'               => Mediadevs\FormAssist\Validate\Rules\Date\DateBefore::class,
    'after_date'                => Mediadevs\FormAssist\Validate\Rules\Date\DateAfter::class,
    'between_date'              => Mediadevs\FormAssist\Validate\Rules\Date\DateBetween::class,

    /*----[ String validation ]---------------------------------------------------------------------------------------*/
    'starts_with'               => Mediadevs\FormAssist\Validate\Rules\String\StartsWith::class,
    'ends_with'                 => Mediadevs\FormAssist\Validate\Rules\String\EndsWith::class,
    'contains'                  => Mediadevs\FormAssist\Validate\Rules\String\Contains::class,
    'regular_expresion'         => Mediadevs\FormAssist\Validate\Rules\String\Regex::class,
    'exact_length'              => Mediadevs\FormAssist\Validate\Rules\String\ExactLength::class,
    'min_length'                => Mediadevs\FormAssist\Validate\Rules\String\MinLength::class,
    'max_length'                => Mediadevs\FormAssist\Validate\Rules\String\MaxLength::class,
    'email'                     => Mediadevs\FormAssist\Validate\Rules\String\Email::class,
    'url'                       => Mediadevs\FormAssist\Validate\Rules\String\Url::class,
    'domain'                    => Mediadevs\FormAssist\Validate\Rules\String\Domain::class,
    'ip_address'                => Mediadevs\FormAssist\Validate\Rules\String\IPAddress::class,
    'ipv4_address'              => Mediadevs\FormAssist\Validate\Rules\String\IPv4Address::class,
    'ipv6_address'              => Mediadevs\FormAssist\Validate\Rules\String\IPv6Address::class,
    'mac_address'               => Mediadevs\FormAssist\Validate\Rules\String\MacAddress::class,

    /*----[ Numeric validation ]--------------------------------------------------------------------------------------*/
    'between'                   => Mediadevs\FormAssist\Validate\Rules\Numeric\Between::class,
    'minimum'                   => Mediadevs\FormAssist\Validate\Rules\Numeric\Min::class,
    'maximum'                   => Mediadevs\FormAssist\Validate\Rules\Numeric\Max::class,
    'equals_to'                 => Mediadevs\FormAssist\Validate\Rules\Numeric\Equal::class,
    'not_equal_to'              => Mediadevs\FormAssist\Validate\Rules\Numeric\NotEqual::class,
    'greater_than'              => Mediadevs\FormAssist\Validate\Rules\Numeric\GreaterThan::class,
    'greater_than_or_equal_to'  => Mediadevs\FormAssist\Validate\Rules\Numeric\GreaterThanOrEqualTo::class,
    'less_than'                 => Mediadevs\FormAssist\Validate\Rules\Numeric\LessThan::class,
    'less_than_or_equal_to'     => Mediadevs\FormAssist\Validate\Rules\Numeric\LessThanOrEqualTo::class,

    /*----[ File validation ]-----------------------------------------------------------------------------------------*/
    'allowed_extensions'        => Mediadevs\FormAssist\Validate\Rules\File\AllowedExtensions::class,
    'allowed_mime_types'        => Mediadevs\FormAssist\Validate\Rules\File\AllowedMimeTypes::class,
    'max_file_size'             => Mediadevs\FormAssist\Validate\Rules\File\MaxFileSize::class,

    /*----[ Email validation ]----------------------------------------------------------------------------------------*/
    'allowed_email_providers'   => Mediadevs\FormAssist\Validate\Rules\Email\AllowedProviders::class,
    'blocked_email_providers'   => Mediadevs\FormAssist\Validate\Rules\Email\BlockedProviders::class,

    /*----[ Payment validation ]--------------------------------------------------------------------------------------*/
    'credit_card'               => Mediadevs\FormAssist\Validate\Rules\Payment\CreditCard::class,
    'iban'                      => Mediadevs\FormAssist\Validate\Rules\Payment\IBAN::class,

    //------------------------------------------------------------------------------------------------------------------
    //                             Please register your custom validation rules down bellow
    //------------------------------------------------------------------------------------------------------------------
];
