<?php

namespace mikevandiepen\utility\Validate\Traits;

trait AttributesTrait
{
    /**
     * The attributes set to validate by
     * @var array
     */
    protected $attributes = array();

    /**
     * The values set to validate by
     * @var array
     */
    protected $values = array();

    /**
     * The parameters set to validate by
     * @var array
     */
    protected $parameters = array();

    /**
     * Parsing the attributes for this rule and storing them in a usable array
     * @return array
     */
    public function getAttributes() : array
    {
        // All the results will be stored in here
        $attributes = array();

        // Parsing through all the attributes and putting them into the $attributes[] array
        if (count($this->attributes) > 1) {
            for ($i = 0; $i < count($this->attributes); $i++) {
                $attributes['attribute' . $i] = $this->attributes[$i];
            }
            $attributes['attribute_list'] = implode(', ', $this->attributes);
        } else {
            $attributes['attribute'] = $this->attributes[0];
        }

        // Parsing through all the values and putting them into the $attributes[] array
        if (count($this->values) > 1) {
            for ($i = 0; $i < count($this->values); $i++) {
                $attributes['value_' . $i] = $this->values[$i];
            }
            $attributes['value_list'] = implode(', ', $this->values);
        } else {
            $attributes['value'] = $this->values[0];
        }

        // Parsing through all the parameters and putting them into the $attributes[] array
        if (count($this->parameters) > 1) {
            for ($i = 0; $i < count($this->parameters); $i++) {
                $attributes['threshold_' . $i] = $this->parameters[$i];
            }
            $attributes['threshold_list'] = implode(', ', $this->parameters);
        } else {
            $attributes['threshold'] = $this->parameters[0];
        }

        return $attributes;
    }
}