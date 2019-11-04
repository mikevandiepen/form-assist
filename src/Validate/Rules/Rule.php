<?php

namespace Mediadevs\FormAssist\Validate\Rules;

class Rule
{
    /**
     * The values set to validate by
     * @var array
     */
    protected $values = array();

    /**
     * The parameters set to validate by
     * @var array
     */
    protected $parameters = array();

    /**
     * Rule constructor.
     *
     * @param array  $values
     * @param array  $parameters
     */
    protected function __construct(array $values, array $parameters = array())
    {
        // Assigning the validation properties
        $this->values       = $values;
        $this->parameters   = $parameters;
    }
}
