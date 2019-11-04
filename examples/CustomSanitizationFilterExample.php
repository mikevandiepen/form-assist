<?php

namespace Mediadevs\FormAssist\Examples;

use mysqli;
use Mediadevs\FormAssist\Sanitize\Filters\Filter;
use Mediadevs\FormAssist\Sanitize\SanitizationInterface;

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
