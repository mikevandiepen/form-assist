<?php

namespace mikevandiepen\utility\Validate\Rules\Types;

use mikevandiepen\utility\Validate\Rules\Rule;
use mikevandiepen\utility\Validate\ValidationInterface;

class TypeBoolean extends Rule implements ValidationInterface
{
    /**
     * TypeBoolean constructor.
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
        return is_bool($this->values[0]);
    }
}