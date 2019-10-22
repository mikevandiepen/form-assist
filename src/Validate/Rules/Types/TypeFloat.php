<?php

namespace mikevandiepen\utility\Validate\Rules\Types;

use mikevandiepen\utility\Validate\Rules\Rule;
use mikevandiepen\utility\Validate\ValidationInterface;

class TypeFloat extends Rule implements ValidationInterface
{
    /**
     * TypeFloat constructor.
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
        return filter_var($this->values[0], FILTER_VALIDATE_FLOAT);
    }
}