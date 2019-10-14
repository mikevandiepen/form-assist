<?php

namespace mikevandiepen\utility\Validate\Rules\Numeric;

use mikevandiepen\utility\Validate\ValidationInterface;

class ValidateFloat implements ValidationInterface
{
    /**
     * The name of the current attribute
     * @var string
     */
    protected $attribute;

    /**
     * The value of the current attribute
     * @var string
     */
    protected $value;

    /**
     * The parameters set to validate by
     * @var array
     */
    protected $parameters;

    /**
     * ValidationRule constructor.
     *
     * @param string $attribute
     * @param string $value
     * @param array  $parameters
     */
    public function __construct(string $attribute, string $value, array $parameters = array())
    {
        $this->attribute    = $attribute;
        $this->value        = $value;
        $this->parameters   = $parameters;
    }

    /**
     * Validating the assigned rule and returning output
     * @return string
     */
    public function validate() : string
    {
        // TODO: Implement validate() method.
    }
}