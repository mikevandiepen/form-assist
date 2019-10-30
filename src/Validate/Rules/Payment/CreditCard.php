<?php

namespace mikevandiepen\utility\Validate\Rules\Payment;

use mikevandiepen\utility\Validate\Rules\Rule;
use mikevandiepen\utility\Validate\ValidationInterface;

class CreditCard extends Rule implements ValidationInterface
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
        /**
         * TODO: Find the best credit-card validation library to implement.
         */
        return false;
    }
}
