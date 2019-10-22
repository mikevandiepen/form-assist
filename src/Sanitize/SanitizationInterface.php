<?php

namespace mikevandiepen\utility\Sanitize;

interface SanitizationInterface
{
    /**
     * Validating the attribute
     * @return string
     */
    public function sanitize(): string;
}
