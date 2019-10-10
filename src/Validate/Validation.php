<?php

namespace mikevandiepen\utility\Validate;

class Validation
{
    /**
     * @var SanitizationInterface
     */
    protected $validation;

    /**
     * Validation constructor.
     *
     * @param SanitizationInterface $validation
     */
    public function __construct(SanitizationInterface $validation)
    {
        $this->validation = $validation;
    }

    /**
     * Validating the assigned rule and returning output
     * @return string
     */
    public function validate() : string
    {
        return $this->validation->validate();
    }
}