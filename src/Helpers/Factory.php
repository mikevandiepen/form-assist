<?php

namespace mikevandiepen\utility\Helpers;

use mysqli;
use Exception;
use mikevandiepen\utility\Validate\Validation;
use mikevandiepen\utility\Sanitize\Sanitization;

class Factory
{
    /**
     * Registry name for validation
     */
    const VALIDATION_REGISTRY   = 'validation';

    /**
     * Registry name for sanitization
     */
    const SANITIZATION_REGISTRY = 'sanitization';

    /**
     * The registered are stored in here
     * @var array
     */
    private $registry   = array();

    /**
     * The aliases for the registered items are stored in here
     * @var array
     */
    private $aliases    = array();

    /**
     * Registry types
     * @var array
     */
    private $registryTypes = array(
        self::VALIDATION_REGISTRY,
        self::SANITIZATION_REGISTRY
    );

    /**
     * Factory constructor.
     *
     * @param string $registryType
     *
     * @throws Exception
     */
    public function __construct(string $registryType)
    {
        if (in_array($registryType, $this->registryTypes)) {
            $this->registry = (new Configuration(self::VALIDATION_REGISTRY))->get();
            $this->aliases  = (new Configuration(self::VALIDATION_REGISTRY . '_aliases'))->get();
        } else {
            throw new Exception('Invalid registry type!');
        }
    }

    /**
     * @param                          $type
     * @param                          $item
     * @param string|array             $firstParameter
     * @param string|array|null|mysqli $secondParameter
     *
     * @return bool
     * @throws Exception
     */
    public function build($type, $item, $firstParameter, $secondParameter = null)
    {
        // Collecting the registry item by alias or name
        if ($this->registeredItemExists($item)) {
            $registry = $item;
        } else {
            if ($this->isAlias($item)) {
                $registry = $this->getRegisteredItemByAlias($item);
            } else {
                throw new Exception('This registry item doesn\'t exist.');
            }
        }

        // The final class name of the registered item
        $class = $this->registry[$registry];

        // validating which action must be called.
        switch($type) {
            case self::VALIDATION_REGISTRY:
                $results = (boolean) (new Validation(
                    new $class($firstParameter, $secondParameter))
                )->validate();
                break;

            case self::SANITIZATION_REGISTRY:
                $results = (boolean) (new Sanitization(
                    new $class($firstParameter, $secondParameter))
                )->sanitize();
                break;

            default:
                $results = false;
        }

        return $results;
    }

    /**
     * Validating whether the index is an alias or not
     * @param string $index
     *
     * @return bool
     */
    private function isAlias(string &$index) : bool
    {
        return in_array($index, $this->registry) ? true : false;
    }

    /**
     * Collecting the registry name by the alias
     * @param string $alias
     *
     * @return bool
     */
    private function getRegisteredItemByAlias(string &$alias) : bool
    {
        return $this->aliases[$alias];
    }

    /**
     * Validating whether the index exists inside the list of registered items
     * @param string $index
     *
     * @return bool
     */
    private function registeredItemExists(string &$index) : bool
    {
        return key_exists($index, $this->registry) ? true : false;
    }
}
