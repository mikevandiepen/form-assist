<?php

namespace mikevandiepen\utility\Validate\Rules\Basic;

use mikevandiepen\utility\Validate\Rules\Rule;
use mikevandiepen\utility\Validate\ValidationInterface;

class Required extends Rule implements ValidationInterface
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
        $false      = $this->values[0] === false;
        $intZero    = $this->values[0] === 0;
        $floatZero  = $this->values[0] === 0.0;
        $stringZero = $this->values[0] === '0';
        $notEmpty   = !empty($this->values[0]);
        $length     = strlen($this->values[0]) !== 0;

        return isset($this->values[0]) && ($false || $intZero || $floatZero || $stringZero || $notEmpty|| $length);
    }
}