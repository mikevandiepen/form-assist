<?php

namespace mikevandiepen\utility\Validate\Rules\Numeric;

use mikevandiepen\utility\Response;
use mikevandiepen\utility\Validate\TranslationTrait;
use mikevandiepen\utility\Validate\ValidationInterface;

class LessThanOrEqualTo implements ValidationInterface
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

        if ( !($this->value == $this->parameters[0])) {
            $response->add($this->getMessage('numeric_less_than_or_equal_to'), [
                'attr'      => $this->attribute,
                'value'     => $this->value,
                'threshold' => $this->parameters[0]
            ], Response::ERROR, true, ['<strong>', '</strong>']);
        }

        return $response->get();
    }
}