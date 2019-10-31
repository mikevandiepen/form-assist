<?php

namespace mikevandiepen\utility\Sanitize;

use mysqli;
use mikevandiepen\utility\Helpers\Configuration;

class Sanitizer
{
    /**
     * Filename for the rules config
     */
    const FILTERS_CONFIG_FILE = 'filters';

    /**
     * Filename for the rules aliases config
     */
    const FILTERS_ALIASES_CONFIG_FILE = 'filters_aliases';

    /**
     * The config for the sanitization filters will be stored in here
     * @var array
     */
    private $filters = array();

    /**
     * The config for the sanitization filters aliases will be stored in here
     * @var array
     */
    private $filtersAliases = array();

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

        // Calling the configuration files
        $this->filters          = (new Configuration(self::FILTERS_CONFIG_FILE))->get();
        $this->filtersAliases   = (new Configuration(self::FILTERS_ALIASES_CONFIG_FILE))->get();
    }

    /**
     * Validating all the values and applying all the assigned rules
     * @return array
     */
    public function sanitize() : array
    {
        foreach($this->config as $field => $filters) {              // Parsing through all the fields
            foreach(explode('|', $filters) as $filter) {   // Parsing through the filters and applying them to each field

                // Getting the configuration for the filter
                $filterConfiguration  = $this->getFilterConfiguration($filter);

                // Creating the namespace dynamically
                $class = 'Rules\\' . $filterConfiguration['class'];

                $this->output[$field] = $this->callSanitizationFilter($class,$filter);
            }
        }

        return $this->output;
    }

    /**
     * @param string $class
     * @param string $field
     *
     * @return bool
     */
    private function callSanitizationFilter(string $class, string $field) : bool
    {
        return (boolean) (new Sanitization(
            new $class($field))
        )->sanitize();
    }

    /**
     * Collects the rule by the alias
     * @param string $alias
     *
     * @return string
     */
    private function getFiltersByAlias(string $alias) : string
    {
        return $this->filtersAliases[$alias];
    }

    /**
     * Collects the rule configuration by the identified rule
     * @param string $filter
     *
     * @return array
     */
    private function getFilterConfiguration(string $filter) : array
    {
        // Checking whether the rule is an alias
        if (in_array($filter, array_keys($this->filtersAliases)) || key_exists($filter, $this->filtersAliases)) {
            // Assigning the rule main name as $filter
            $filter = $this->getFiltersByAlias($filter);
        }

        // Validating whether the rule exists
        if (key_exists($filter, $this->filters)) {
            return $this->filters[$filter];
        } else {
            return array();
        }
    }
}
