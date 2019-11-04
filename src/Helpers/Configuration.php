<?php

namespace Mediadevs\FormAssist\Helpers;

class Configuration
{
    /**
     * Abbreviation for DirectorySeparator
     */
    const DS = DIRECTORY_SEPARATOR;

    /**
     * The name / location of the package directory
     * @var string
     */
    private $packageDir;

    /**
     * The name of the config directory
     * @var string
     */
    private $configDir;

    /**
     * The config file which should be opened
     * @var string
     */
    private $targetFile;

    /**
     * Config constructor.
     * Assigning basic properties
     * @param string $targetFile
     * @param string $configDir
     */
    public function __construct(string $targetFile, string $configDir = 'config')
    {
        $this->targetFile   = $targetFile;
        $this->configDir    = $configDir;
        $this->packageDir   = dirname(__DIR__, 2);
    }

    /**
     * Returns the configuration
     * @return array
     */
    public function get() : array
    {
        return include($this->packageDir . self::DS . $this->configDir . self::DS . $this->targetFile . '.php');
    }
}
