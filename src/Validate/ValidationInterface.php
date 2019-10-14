<?php

namespace mikevandiepen\utility\Validate;

interface ValidationInterface
{
    /**
     * Validation constructor.
     *
     * @param string $attribute
     * @param string $value
     * @param array  $parameters
     */
    public function __construct(string $attribute, string $value, array $parameters = array());

    /**
     * Validating the assigned rule and returning output
     * @return string
     */
    public function validate() : string ;
}