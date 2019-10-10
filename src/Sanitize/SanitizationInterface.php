<?php

namespace mikevandiepen\utility\Sanitize;

interface SanitizationInterface
{
    /**
     * SanitizationInterface constructor.
     *
     * @param $input
     */
    public function __construct($input);

    /**
     * Validating the attribute
     * @return string
     */
    public function sanitize(): string;
}