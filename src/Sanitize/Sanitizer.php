<?php

namespace mikevandiepen\utility\Sanitize;

use mysqli;
use mikevandiepen\utility\Helpers\Factory;

class Sanitizer
{
    /**
     * REGISTRY_TYPE used for the factory
     */
    const REGISTRY_TYPE = 'sanitization';

    /**
     * All cleaned output will be stored in here
     * @var array
     */
    private $output = array();

    /**
     * The $_POST request / data which should be sanitized is stored in here
     * @var array
     */
    private $request = array();

    /**
     * The filters which are applied to the data
     * @var array
     */
    private $config = array();

    /**
     * The mysqli object which will be used for SQL sanitization
     * @var mysqli|null
     */
    private $link = null;

    /**
     * Sanitizer constructor.
     *
     * @param array $request
     * @param array $config
     * @param null|mysqli  $link
     */
    public function __construct(array $request, array $config = array(), $link = null)
    {
        $this->request  = $request;
        $this->config   = $config;
        $this->link     = $link;
    }

    /**
     * Validating all the values and applying all the assigned rules
     * @return array
     * @throws \Exception
     */
    public function sanitize() : array
    {
        // Instantiating the factory
        $factory = new Factory(self::REGISTRY_TYPE);

        foreach($this->config as $field => $filters) {              // Parsing through all the fields
            foreach(explode('|', $filters) as $filter) {   // Parsing through the filters and applying them to each field
                // Getting the configuration for the filter
                $this->output[$field] = $factory->build(self::REGISTRY_TYPE, $filter, $field);
            }
        }

        return $this->output;
    }
}
