<?php

namespace Mediadevs\FormAssist\Sanitize;

interface SanitizationInterface
{
    /**
     * Validating the attribute
     * @return string
     */
    public function sanitize(): string;
}
