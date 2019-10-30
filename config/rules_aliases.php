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
//  [
//      'alias' => 'rule_name' (As in config/rules.php)
//  ]
//
//  If your rule has aliases, you need to register the alias inside '/config/rules_aliases.php'. More details are inside
//  the rules_aliases file.
//
//----------------------------------------------------------------------------------------------------------------------
//                          Did you add a new translation? Please submit it to the repository!
//----------------------------------------------------------------------------------------------------------------------

return [
    // rule_alias       => rule_name
    'num'               => 'numeric',
    'bool'              => 'boolean',
    'int'               => 'integer',
    'regex'             => 'regular_expression',
    'expression'        => 'regular_expression',
    'minlen'            => 'minimum_length',
    'min_length'        => 'minimum_length',
    'maxlen'            => 'maximum_length',
    'max_length'        => 'maximum_length',
    'ip'                => 'ip_address',
    'ipv4'              => 'ipv4_address',
    'ipv6'              => 'ipv6_address',
    'mac'               => 'mac_address',
    'min'               => 'minimum',
    'max'               => 'maximum',
    'equal'             => 'equals_to',
    'equals'            => 'equals_to',
    'equal_to'          => 'equals_to',
    'not_equal'         => 'not_equal_to',
    'gt'                => 'greater_than',
    'gte'               => 'greater_than_or_equal_to',
    'lt'                => 'less_than',
    'lte'               => 'less_than_or_equal_to',
    'max_size'          => 'max_file_size',
    'allowed_providers' => 'allowed_email_providers',
    'blocked_providers' => 'blocked_email_providers',
    'cc'                => 'credit_card',
    // Add your custom aliases below:
];

