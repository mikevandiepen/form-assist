<?php

namespace Mediadevs\FormAssist\Validate\Rules\Numeric;

use Mediadevs\FormAssist\Validate\Rules\Rule;
use Mediadevs\FormAssist\Validate\ValidationInterface;

class Between extends Rule implements ValidationInterface
{
    /**
     * Required constructor.
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
