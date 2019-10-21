<?php

namespace mikevandiepen\utility\Validate\Rules\String;

use mikevandiepen\utility\Validate\Rules\Rule;
use mikevandiepen\utility\Validate\ValidationInterface;

class ExactLength extends Rule implements ValidationInterface
{
    /**
     * ExactLength constructor.
     *
     * @param array  $values
     * @param array  $parameters
     */
    public function __construct(array $values, array $parameters = array())
    {
        parent::__construct($values, $parameters);
    }

    /**
     * Validating the assigned rule and returning whether it passes or not
     * @return boolean
     */
    public function validate() : bool
    {
        return strlen($this->values[0]) === $this->parameters[0];
    }
}