<?php

namespace Mediadevs\FormAssist\Sanitize\Filters;

use mysqli;
use Mediadevs\FormAssist\Sanitize\SanitizationInterface;

class SanitizeXSS extends Filter implements SanitizationInterface
{
    /**
     * SanitizationInterface constructor.
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
        return htmlentities($this->input, ENT_QUOTES);
    }
}
