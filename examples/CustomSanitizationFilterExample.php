<?php

namespace mikevandiepen\utility\Examples;

use mysqli;
use mikevandiepen\utility\Sanitize\Filters\Filter;
use mikevandiepen\utility\Sanitize\SanitizationInterface;

class CustomSanitizationFilterExample extends Filter implements SanitizationInterface
{
    /**
     * CustomSanitizationFilterExample constructor.
     *
     * @param             $input
     * @param null|mysqli $link
     */
    public function __construct($input, $link = null)
    {
        parent::__construct($input, $link);
    }

    /**
     * Validating the attribute
     * @return string
     */
    public function sanitize() : string
    {
        /** Add custom logic here and return the output as string. */
        return '';
    }
}
