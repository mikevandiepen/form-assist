<?php

namespace Mediadevs\FormAssist\Validate;

interface ValidationInterface
{
    /**
     * Validation constructor.
     *
     * @param array  $values
     * @param array  $parameters
     */
    public function __construct(array $values, array $parameters = array());

    /**
     * Validating the assigned rule and returning whether it passes or not
     * @return boolean
     */
    public function validate() : bool;
}
