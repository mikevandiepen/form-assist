<?php

namespace mikevandiepen\utility\Validate\Rules\Numeric;

use mikevandiepen\utility\Validate\Rules\Rule;
use mikevandiepen\utility\Validate\ValidationInterface;

class Equal extends Rule implements ValidationInterface
{
    /**
     * Equal constructor.
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
        return $this->values[0] == $this->parameters[0];
    }
}