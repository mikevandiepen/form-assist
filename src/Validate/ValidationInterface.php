<?php

namespace mikevandiepen\utility\Validate;

interface ValidationInterface
{
    /**
     * Validation constructor.
     *
     * @param array  $attributes
     * @param array  $values
     * @param array  $parameters
     */
    public function __construct(array $attributes, array $values, array $parameters = array());

    /**
     * Validating the assigned rule and returning output
     * @return string
     */
    public function validate() : string ;
}