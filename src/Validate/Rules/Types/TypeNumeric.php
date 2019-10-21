<?php

namespace mikevandiepen\utility\Validate\Rules\Types;

use mikevandiepen\utility\Validate\Rules\Rule;
use mikevandiepen\utility\Validate\ValidationInterface;

class TypeNumeric extends Rule implements ValidationInterface
{
    /**
     * TypeNumeric constructor.
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
        return is_numeric($this->values[0]);
    }
}