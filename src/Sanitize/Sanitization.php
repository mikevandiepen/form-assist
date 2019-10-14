<?php

namespace mikevandiepen\utility\Sanitize;

class Sanitization
{
    /**
     * @var SanitizationInterface
     */
    protected $sanitization;

    /**
     * The link for the mysqli connection
     * @var
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
        return empty($this->link)
            ? $this->sanitization->sanitize()
            : $this->sanitization->link($this->link)->sanitize();
    }

    /**
     * @param $link
     *
     * @return Sanitization
     */
    public function link($link) : self
    {
        $this->link = $link;

        return $this;
    }
}