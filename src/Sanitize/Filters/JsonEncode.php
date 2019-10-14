<?php

namespace mikevandiepen\utility\Sanitize\Filters;

use mikevandiepen\utility\Sanitize\SanitizationInterface;

class JsonEncode implements SanitizationInterface
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
        return json_encode($this->input, JSON_PRETTY_PRINT);
    }

    /**
     * This method is only used in the class SanitizeSQL
     * @param $link
     * @return void
     */
    public function link($link) : void {}
}