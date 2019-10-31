<?php

namespace mikevandiepen\utility\Validate;

class Validation
{
    /**
     * @var ValidationInterface
     */
    protected $validation;

    /**
     * Validation constructor.
     *
     * @param ValidationInterface $validation
     */
    public function __construct(ValidationInterface $validation)
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
