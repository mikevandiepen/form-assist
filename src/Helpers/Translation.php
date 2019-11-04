<?php

namespace Mediadevs\FormAssist\Helpers;

class Translation
{
    /**
     * Filename for the aliases file
     */
    const ALIASES_CONFIG_FILE       = 'rules_aliases';

    /**
     * Filename for the config file
     */
    const TRANSLATIONS_CONFIG_FILE = 'translations';

    /**
     * Location for the translations
     * @var array
     */
    private $translations = array();

    /**
     * Location for the aliases
     * @var array
     */
    private $aliases = array();

    /**
     * Translator constructor.
     */
    public function __construct()
    {
        // Instantiating the config file and collecting the translations
        $this->translations = (new Configuration(self::TRANSLATIONS_CONFIG_FILE))->get();

        // Instantiating the config file and collecting the aliases
        $this->aliases      = (new Configuration(self::ALIASES_CONFIG_FILE))->get();
    }

    /**
     * @param string $rule
     * @param string $locale
     * @return string
     */
    public function get(string $rule, string $locale = 'default') : string
    {
        $aliases = array_values($this->aliases);

        // If $rule is an alias the translation will be collected based on the alias
        if (in_array($rule, $aliases)) {
            $translation = $this->translations[$this->aliases[$rule][$locale]];
        } else {
            // Validating whether the rule exists
            if (array_key_exists($rule, $this->translations)) {
                $translation = $this->translations[$rule][$locale];
            } else {
                $translation = 'Message not found!';
            }
        }

        return !empty($translation) ? $translation : 'Translation not found';
    }
}
