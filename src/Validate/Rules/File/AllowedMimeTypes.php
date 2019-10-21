<?php

namespace mikevandiepen\utility\Validate\Rules\File;

use mikevandiepen\utility\Validate\Rules\Rule;
use mikevandiepen\utility\Validate\ValidationInterface;

class AllowedMimeTypes extends Rule implements ValidationInterface
{
    /**
     * AllowedMimeTypes constructor.
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
        return in_array(mime_content_type($this->values[0]), $this->parameters);
    }
}