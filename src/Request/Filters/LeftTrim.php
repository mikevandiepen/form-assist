<?php

namespace mikevandiepen\utility\Request\Filters;

use mikevandiepen\utility\Request\SanitizationInterface;

class LeftTrim implements SanitizationInterface
{
    /**
     * The input for sanitization
     * @var string
     */
    protected $input;

    /**
     * SanitizationInterface constructor.
     *
     * @param $input
     */
    public function __construct($input)
    {
        $this->input = $input;
    }

    /**
     * Validating the attribute
     * @return string
     */
    public function sanitize() : string
    {
        // TODO: Implement sanitize() method.
    }
}