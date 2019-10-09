<?php

namespace mikevandiepen\utility\Validate;

class FileValidator implements ValidationInterface
{
    /**
     * Validation constructor.
     *
     * @param string $attribute
     * @param string $value
     */
    public function __construct(string $attribute, string $value)
    {

    }

    /**
     * Validating the assigned rule and returning output
     *
     * @param array $parameters
     *
     * @return string
     */
    public function validate(array $parameters = array()) : string
    {
        // TODO: Implement validate() method.
    }
}