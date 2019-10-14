<?php

namespace mikevandiepen\utility\Sanitize;

interface SanitizationInterface
{
    /**
     * SanitizationInterface constructor.
     *
     * @param      $input
     * @param null $link
     */
    public function __construct($input, ?$link = null);

    /**
     * Validating the attribute
     * @return string
     */
    public function sanitize(): string;
}