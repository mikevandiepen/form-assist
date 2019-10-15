<?php

namespace mikevandiepen\utility\Validate\Rules\Types;

use mikevandiepen\utility\Response;
use mikevandiepen\utility\Validate\ValidationInterface;
use mikevandiepen\utility\Validate\Traits\AttributesTrait;
use mikevandiepen\utility\Validate\Traits\TranslationTrait;

class TypeArray implements ValidationInterface
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

        if (!is_array($this->values[0])) {
            $response->add($this->getMessage('type_array'), $this->getAttributes(), Response::ERROR, true, ['<strong>', '</strong>']);
        }

        return $response->get();
    }
}