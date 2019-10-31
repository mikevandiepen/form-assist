<?php
//----------------------------------------------------------------------------------------------------------------------
//                                       How to register your new validation rule
//----------------------------------------------------------------------------------------------------------------------
//
//  For each new rule your create you need to add the configuration here.
//  If the rule is not registered it can not be used.
//  The values you have to fill are:
//  - rule_alias    (The alias for an existing rule)
//  - rule_name     (The rule name which alias is an alias from)
//
//  Structure:
//  [
//      'alias' => 'rule_name' (As in config/rules.php)
//  ]
//
//----------------------------------------------------------------------------------------------------------------------
//                            Did you add a new aliases? Please submit it to the repository!
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

