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
     * @return array
     * @throws \Exception
     */
    public function getMessage() : array
    {
        try {
            $file = '../Lang/' . $this->locale . '.php';

            if (file_exists($file)) {
                return include_once($file);
            } else {
                throw new \Exception('Translation "' . $this->locale . '" not found!');
            }

        } catch (\Exception $e) {
            print $e->getMessage();
            exit();
        }
    }
}