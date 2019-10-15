<?php

namespace mikevandiepen\utility\Validate\Rules\Numeric;

use mikevandiepen\utility\Response;
use mikevandiepen\utility\Validate\ValidationInterface;
use mikevandiepen\utility\Validate\Traits\AttributesTrait;

class Between implements ValidationInterface
{
    use AttributesTrait;

    /**
     * ValidationRule constructor.
     *
     * @param array $attributes
     * @param array $values
     * @param array $parameters
     */
    public function __construct(array $attributes, array $values, array $parameters = array())
    {
        $this->attributes = $attributes;
        $this->values     = $values;
        $this->parameters = $parameters;
    }

    /**
     * Validating the assigned rule and returning output
     * @return string
     * @throws \Exception
     */
    public function validate() : string
    {
        $response = new Response();

        // Validating if value is between the two parameters, the order of the parameters doesn't matter.
        if ( !(($this->values[0] > $this->parameters[0] && $this->values[0] < $this->parameters[1])||
               ($this->values[0] > $this->parameters[1] && $this->values[0] < $this->parameters[0]))) {
            $response->add($this->getMessage('numeric_between'), $this->getAttributes(), Response::ERROR, true, ['<strong>', '</strong>']);
        }

        return $response->get();
    }
}