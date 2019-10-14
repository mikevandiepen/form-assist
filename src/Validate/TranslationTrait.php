<?php

namespace mikevandiepen\utility\Validate;

trait TranslationTrait
{
    /**
     * The locale for the current language configuration
     * @var string
     */
    private $locale = 'en_US';

    /**
     * This returns an array with the error messages of the selected language
     * @param string $key
     * @return string
     * @throws \Exception
     */
    public function getMessage(string $key) : string
    {
        return (include_once( 'Lang/' . $this->locale . '.php'))[$key];
    }
}