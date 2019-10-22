<?php

namespace mikevandiepen\utility\Sanitize\Filters;

class Filter
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
    protected $link;

    /**
     * SanitizationInterface constructor.
     *
     * @param             $input
     * @param null|string $link
     */
    protected function __construct($input, $link = null)
    {
        $this->input    = $input;
        $this->link     = $link;
    }
}
