<?php

namespace mikevandiepen\utility\Validate\Rules\Date;

use mikevandiepen\utility\Validate\Rules\Rule;
use mikevandiepen\utility\Validate\ValidationInterface;

class DateBetween extends Rule implements ValidationInterface
{
    /**
     * Between constructor.
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
        // Validating if value is between the two parameters, the order of the parameters doesn't matter.
        return ($this->values[0] > $this->parameters[0] && $this->values[0] < $this->parameters[1]) ||
               ($this->values[0] > $this->parameters[1] && $this->values[0] < $this->parameters[0]);
    }
}
