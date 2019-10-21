<?php

namespace mikevandiepen\utility\Validate\Rules\String;

use mikevandiepen\utility\Validate\Rules\Rule;
use mikevandiepen\utility\Validate\ValidationInterface;

class StartsWith extends Rule implements ValidationInterface
{
    /**
     * StartsWith constructor.
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
        return substr_compare($this->values[0], $this->parameters[0], 0, strlen($this->parameters[0])) === 0;
    }
}