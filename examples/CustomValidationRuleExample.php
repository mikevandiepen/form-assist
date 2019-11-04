<?php

namespace Mediadevs\FormAssist\Examples;

use Mediadevs\FormAssist\Validate\Rules\Rule;
use Mediadevs\FormAssist\Validate\ValidationInterface;

class CustomValidationRuleExample extends Rule implements ValidationInterface
{
    /**
     * CustomValidationRuleExample constructor.
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
        /**
         * Add custom logic here and return the results as a bool.
         * -------------------------------------------------------------------------------------------------------------
         *
         * What you need to do;
         *
         * - You'll also need to create a custom translation for your custom rule at src/Validate/Translations
         *   for at least default.php
         *
         * - You'll need to add your translation rule inside src/Validate/Validator inside the switch statement
         *   You can add aliases for your rule, make sure that the array key for your translation is identical to the
         *   rule name
         */
        return false;
    }
}
