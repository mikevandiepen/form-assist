<?php

namespace mikevandiepen\utility\Validate\Rules\Email;

use mikevandiepen\utility\Validate\Rules\Rule;
use mikevandiepen\utility\Validate\ValidationInterface;
use mikevandiepen\utility\Validate\Traits\ExtractDomainTrait;

class BlockedProviders extends Rule implements ValidationInterface
{
    use ExtractDomainTrait;

    /**
     * BlockedProviders constructor.
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
        // Its the same as "AllowedProviders" but then reversed.
        return !in_array($this->extractDomainFromEmail($this->values[0]), $this->parameters);
    }
}