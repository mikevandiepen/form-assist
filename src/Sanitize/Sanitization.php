<?php

namespace mikevandiepen\utility\Sanitize;

use mysqli;

class Sanitization
{
    /**
     * @var SanitizationInterface
     */
    protected $sanitization;

    /**
     * The link for the mysqli connection
     * @var null|mysqli
     */
    private $link;

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
