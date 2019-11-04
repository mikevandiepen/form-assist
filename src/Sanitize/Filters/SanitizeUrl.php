<?php

namespace Mediadevs\FormAssist\Sanitize\Filters;

use mysqli;
use Mediadevs\FormAssist\Sanitize\SanitizationInterface;

class SanitizeUrl extends Filter implements SanitizationInterface
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
        return filter_var($this->input, FILTER_SANITIZE_URL);
    }
}
