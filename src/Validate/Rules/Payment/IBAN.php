<?php

namespace Mediadevs\FormAssist\Validate\Rules\Payment;

use Mediadevs\FormAssist\Validate\Rules\Rule;
use Mediadevs\FormAssist\Validate\ValidationInterface;

class IBAN extends Rule implements ValidationInterface
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
         * TODO: Find the best iban validation library to implement.
         */
        return false;
    }
}
