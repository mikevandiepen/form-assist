<?php

namespace mikevandiepen\utility\Validate\Rules\String;

use mikevandiepen\utility\Response;
use mikevandiepen\utility\Validate\ValidationInterface;
use mikevandiepen\utility\Validate\Traits\AttributesTrait;
use mikevandiepen\utility\Validate\Traits\TranslationTrait;

class EndsWith implements ValidationInterface
{
    use TranslationTrait, AttributesTrait;

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

        if (!(substr_compare($this->values[0], $this->parameters[0], -strlen($this->parameters[0])) === 0)) {
            $response->add($this->getMessage('ends_with'), $this->getAttributes(), Response::ERROR, true, ['<strong>', '</strong>']);
        }

        return $response->get();
    }
}