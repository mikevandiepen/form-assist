<?php

namespace mikevandiepen\utility\Validate\Rules\File;

use mikevandiepen\utility\Validate\Rules\Rule;
use mikevandiepen\utility\Validate\ValidationInterface;

class AllowedExtensions extends Rule implements ValidationInterface
{
    /**
     * AllowedExtensions constructor.
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
        return in_array(pathinfo($this->values[0], PATHINFO_EXTENSION), $this->parameters);
    }
}