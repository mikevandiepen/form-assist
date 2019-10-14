<?php

namespace mikevandiepen\utility\Validate\Rules\Types;

use mikevandiepen\utility\Response;
use mikevandiepen\utility\Validate\TranslationTrait;
use mikevandiepen\utility\Validate\ValidationInterface;

class TypeBoolean implements ValidationInterface
{
    use TranslationTrait;

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
     * @throws \Exception
     */
    public function validate() : string
    {
        $response = new Response();

        if ( !(is_bool($this->value))) {
            $response->add($this->getMessage('type_boolean'), [
                'attr' => $this->attribute,
            ], Response::ERROR, true, ['<strong>', '</strong>']);
        }

        return $response->get();
    }
}