<?php

namespace mikevandiepen\utility\Validate\Date;

use mikevandiepen\utility\Validate\ValidationInterface;

class Between implements ValidationInterface
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
     * Validation constructor.
     *
     * @param string $attribute
     * @param string $value
     */
    public function __construct(string $attribute, string $value)
    {
        $this->attribute = $attribute;
        $this->value     = $value;
    }

    /**
     * Validating the assigned rule and returning output
     * @param array $parameters
     *
     * @return string
     */
    public function validate(array $parameters = array()) : string
    {
        // TODO: Implement validate() method.
    }
}