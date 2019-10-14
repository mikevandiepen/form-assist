<?php

namespace mikevandiepen\utility\Sanitize\Filters;

use mikevandiepen\utility\Sanitize\SanitizationInterface;

class SanitizeSQL implements SanitizationInterface
{
    /**
     * The input for sanitization
     * @var string
     */
    protected $input;

    /**
     * The link for the mysqli connection
     * @var
     */
    private $link;

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
        return mysqli_real_escape_string($this->input);
    }

    public function link($link) : self
    {
        $this->link = $link;

        return $this;
    }
}