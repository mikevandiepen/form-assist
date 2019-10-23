<?php

namespace mikevandiepen\utility\Translator;

use mikevandiepen\utility\Translator\Helper\TranslationHelper;

class Translator extends TranslationHelper
{
    /**
     * The language translations will be stored in here
     * @var array
     */
    private $language = array();

    /**
     * Translator constructor.
     * This method gets the language and stores the contents inside the $this->language variable
     *
     * @param string $locale
     */
    public function __construct(string $locale = 'en_US')
    {
        parent::__construct();

        if ($this->languagesDirectoryExits()) {
            if ($this->languageFileExists($locale)) {
                $this->language = $this->openLanguageFile($locale);
            }
        }
    }

    /**
     * Getting the translation
     * @param string $translation
     *
     * @return Translation
     */
    public function get(string $translation) : string
    {
        // Validating if the translation exists inside the language file.
        if ($this->translationExists($translation, $this->language)) {
            return $this->language[$translation];
        }

        return 'Translation not found!';
    }
}