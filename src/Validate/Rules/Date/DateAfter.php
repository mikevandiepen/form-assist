<?php

namespace mikevandiepen\utility\Validate\Rules\Date;

use mikevandiepen\utility\Validate\Rules\Rule;
use mikevandiepen\utility\Validate\ValidationInterface;

class DateAfter extends Rule implements ValidationInterface
{
    /**
     * After constructor.
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
        return !($this->values[0] > $this->parameters[0]);
    }
}