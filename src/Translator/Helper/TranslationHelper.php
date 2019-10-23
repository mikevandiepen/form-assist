<?php

namespace mikevandiepen\utility\Translator\Helper;

class TranslationHelper
{
    const TRANSLATIONS_DIRECTORY = DIRECTORY_SEPARATOR . 'Validate' . DIRECTORY_SEPARATOR . 'Translations' . DIRECTORY_SEPARATOR;

    /**
     * Location of the translations directory
     * @var
     */
    private $translationsDirectory;

    /**
     * Registering the language directory
     * TranslationHelper constructor.
     */
    public function __construct()
    {
        $this->translationsDirectory = dirname(__DIR__, 2) . TranslationHelper::TRANSLATIONS_DIRECTORY;
    }

    /**
     * This method validates if the languages directory exists
     * @return bool
     */
    public function languagesDirectoryExits() : bool
    {
        // This determines whether the /translations/ directory exists.
        // If the directory doesn't exists one will be created.
        if (!file_exists($this->translationsDirectory)) {
            mkdir($this->translationsDirectory, 0777);
            return true;
        } else {
            return true;
        }
    }

    /**
     * This method validates if a language file exists
     * @param string $language
     *
     * @return bool
     */
    public function languageFileExists(string $language) : bool
    {
        $fileName = $this->translationsDirectory . $language . '.php';
        $fileContents = "<?php

//----------------------------------------------------------------------------------------------------------------------
//                                        How to implement parameters
//----------------------------------------------------------------------------------------------------------------------
//
//  List of parameters:
//
//  {%attribute%}:      The field / attribute
//  {%value%}:          The value of the field
//  {%threshold%}:      The threshold of the validation rule
//----------------------------------------------------------------------------------------------------------------------
//
//  If your rule has multiple Thresholds or values, the parameters will go as the following:
//
//  {%value_1%}:        The first value of the field (Increments)
//  {%threshold_1%}:    The first threshold of the field (Increments)
//
//----------------------------------------------------------------------------------------------------------------------
//
//  If you have a new custom rule and you want to add a translation for it; set-up the translation string as the following:
//
//  'rule' => 'translation string'
//
//----------------------------------------------------------------------------------------------------------------------
//                      Is this a custom language file? Please submit it to the repository!
//----------------------------------------------------------------------------------------------------------------------

return [
    // Default validation translations
    'required'                  => '',

    // Type validation translations
    'num'                       => '',
    'numeric'                   => '',

    'float'                     => '',

    'bool'                      => '',
    'boolean'                   => '',

    'int'                       => '',
    'integer'                   => '',

    'null'                      => '',
    'string'                    => '',
    'array'                     => '',

    // Date validation translations
    'date_after'                => '',
    'date_before'               => '',
    'date_between'              => '',

    // String validation translations
    'minlen'                    => '',
    'min_length'                => '',
    
    'maxlen'                    => '',
    'max_length'                => '',
    
    'exact_length'              => '',
    'starts_with'               => '',
    'ends_with'                 => '',

    'contains'                  => '',
    'regex'                     => '',

    'email'                     => '',
    'url'                       => '',
    'domain'                    => '',

    'ip'                        => '',
    'ip_address'                => '',

    'mac'                       => '',
    'mac_address'               => '',

    // Numeric validation translations
    'between'                   => '',

    'min'                       => '',
    'minimum'                   => '',

    'max'                       => '',
    'maximum'                   => '',

    'equal'                     => '',
    'equals'                    => '',
    'equal_to'                  => '',
    'equals_to'                 => '',

    'not_equal'                 => '',
    'not_equal_to'              => '',

    'gt'                        => '',
    'greater_than'              => '',

    'gte'                       => '',
    'greater_than_or_equal_to'  => '',

    'lt'                        => '',
    'less_than'                 => '',

    'lte'                       => '',
    'less_than_or_equal_to'     => '',

    // File validation translations
    'max_size'                  => '',
    'max_file_size'             => '',

    'allowed_mime_type'         => '',
    'allowed_extensions'        => '',
    
    // Email validation translation
    'allowed_providers'         => '',
    'allowed_email_providers'   => '',

    'blocked_providers'         => '',
    'blocked_email_providers'   => '',
];";

        // This determines whether the language file exists.
        // If the file doesn't exists one will be created and be seeded with base contents.
        if (!file_exists($fileName)) {
            file_put_contents($fileName, $fileContents);
            return true;
        } else {
            return true;
        }
    }

    /**
     * This method validates if the requested translation exists inside the language file
     * @param string $translation
     * @param array  $language
     *
     * @return bool
     */
    public function translationExists(string $translation, array $language = array()) : bool
    {
        return key_exists($translation, $language) && !empty($language[$translation]);
    }

    /**
     * This method includes the file and returns the contents.
     * @param string $locale
     *
     * @return array
     */
    public function openLanguageFile(string $locale) : array
    {
        return include($this->translationsDirectory . $locale . '.php');
    }
}