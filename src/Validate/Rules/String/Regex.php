<?php

namespace Mediadevs\FormAssist\Validate\Rules\String;

use Mediadevs\FormAssist\Validate\Rules\Rule;
use Mediadevs\FormAssist\Validate\ValidationInterface;

class Regex extends Rule implements ValidationInterface
{
    /**
     * Regex constructor.
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
        return preg_match($this->parameters[0], $this->values[0]);
    }
}
