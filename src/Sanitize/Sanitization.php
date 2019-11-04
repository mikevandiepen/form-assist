<?php

namespace Mediadevs\FormAssist\Sanitize;

class Sanitization
{
    /**
     * @var SanitizationInterface
     */
    protected $sanitization;

    /**
     * Validation constructor.
     *
     * @param SanitizationInterface $sanitization
     */
    public function __construct(SanitizationInterface $sanitization)
    {
        $this->sanitization = $sanitization;
    }

    /**
     * Validating the assigned rule and returning output
     * @return string
     */
    public function sanitize(): string
    {
        return $this->sanitization->sanitize();
    }
}
