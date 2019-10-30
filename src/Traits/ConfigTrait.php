<?php

namespace mikevandiepen\utility\Traits;

trait ConfigTrait
{
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
     * ConfigTrait constructor.
     * Assigning basic properties
     *
     * @param string $configDir
     */
    public function __construct(string $configDir = 'config')
    {
        $this->packageDir   = dirname(__DIR__, 2);
        $this->configDir    = $configDir;
    }

    /**
     * Which config file should be opened
     * @param string $targetFile
     *
     * @return ConfigTrait
     */
    public function config(string $targetFile) : self
    {
        $this->targetFile = $targetFile;

        return $this;
    }

    /**
     * Returns the configuration
     * @return array
     */
    public function get() : array
    {
        return [];
    }
}
