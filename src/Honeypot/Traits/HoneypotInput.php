<?php

namespace mikevandiepen\utility\Honeypot\Traits;

Trait HoneypotInput
{
    /**
     * The input's label;  Defaults to 'Enter your favorite food!'
     * @var string
     */
    private $label = 'Enter your favorite food!';

    /**
     * Type attribute for the input;  Defaults to 'text'
     * @var string
     */
    private $type = 'text';

    /**
     * Name attribute for the input;  Defaults to 'favorite_food'
     * @var string
     */
    private $name = 'favorite_food';

    /**
     * Class attribute for the input; Defaults to 'favorite_food'
     * @var string
     */
    private $class = 'favorite_food';

    /**
     * Id attribute for the input; Defaults to 'favorite_food'
     * @var string
     */
    private $id = 'favorite_food';

    /**
     * Placeholder attribute for the input; Defaults to 'Your favorite food'
     * @var string
     */
    private $placeholder = 'Your favorite food';

    /**
     * Minlength attribute for the input; Defaults to 'false'
     * @var bool|integer|string
     */
    private $minlength = false;

    /**
     * Maxlength attribute for the input; Defaults to 'false'
     * @var bool|integer|string
     */
    private $maxlength = false;

    /**
     * Min attribute for the input; Defaults to 'false'
     * @var bool|integer|string
     */
    private $min = false;

    /**
     * Max attribute for the input; Defaults to 'false'
     * @var bool|integer|string
     */
    private $max = false;

    /**
     * Step attribute for the input; Defaults to 'false'
     * @var bool|integer|string
     */
    private $step = false;

    /**
     * Whether the field must use autofocus on the input; Defaults to 'false'
     * @var bool
     */
    private $autofocus = false;

    /**
     * Whether the field must use autocomplete on the input; Defaults to 'false'
     * @var bool
     */
    private $autocomplete = false;

    /**
     * Instantiating the input field
     * @return HoneypotInput
     */
    public function input() : self
    {
        return $this;
    }

    /**
     * Label for the input field.
     *
     * @param string $label
     *
     * @return HoneypotInput
     */
    public function label(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Type attribute for the input field
     * @param string $type
     *
     * @return HoneypotInput
     */
    public function type(string $type = 'text'): self
    {
        $types = array(
            'button',
            'checkbox',
            'color',
            'date',
            'datetime-local',
            'email',
            'file',
            'hidden',
            'image',
            'month',
            'number',
            'password',
            'radio',
            'range',
            'reset',
            'search',
            'submit',
            'tel',
            'text',
            'time',
            'url',
            'week '
        );

        // Validating whether the type is a valid type, else it defaults to text
        $this->type = in_array($type, $types) ? $type : 'text';
        
        return $this;
    }

    /**
     * Name attribute for the input field
     * @param string $name
     *
     * @return HoneypotInput
     */
    public function name(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Class attribute for the input field
     * @param string $class
     *
     * @return HoneypotInput
     */
    public function class(string $class): self
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Id attribute for the input field
     * @param string $id
     *
     * @return HoneypotInput
     */
    public function id(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Placeholder attribute for the input field
     * @param string $placeholder
     *
     * @return HoneypotInput
     */
    public function placeholder(string $placeholder): self
    {
        $this->placeholder = $placeholder;

        return $this;
    }

    /**
     * Minlength attribute for the input field
     * @param string $minlength
     *
     * @return HoneypotInput
     */
    public function minlength(string $minlength): self
    {
        $this->minlength = $minlength;

        return $this;
    }

    /**
     * Maxlength attribute for the input field
     * @param string $maxlength
     *
     * @return HoneypotInput
     */
    public function maxlength(string $maxlength): self
    {
        $this->maxlength = $maxlength;

        return $this;
    }

    /**
     * Min attribute for the input field
     * @param string $min
     *
     * @return HoneypotInput
     */
    public function min(string $min): self
    {
        $this->min = $min;

        return $this;
    }

    /**
     * Max attribute for the input field
     * @param string $max
     *
     * @return HoneypotInput
     */
    public function max(string $max): self
    {
        $this->max = $max;

        return $this;
    }

    /**
     * Step attribute for the input field
     * @param string $step
     *
     * @return HoneypotInput
     */
    public function step(string $step): self
    {
        $this->step = $step;

        return $this;
    }

    /**
     * Autofocus attribute for the input field
     * @param bool $autofocus
     *
     * @return HoneypotInput
     */
    public function autofocus(bool $autofocus): self
    {
        $this->autofocus = $autofocus;

        return $this;
    }

    /**
     * Autocomplete attribute for the input field
     * @param bool $autocomplete
     *
     * @return HoneypotInput
     */
    public function autocomplete(bool $autocomplete): self
    {
        $this->autocomplete = $autocomplete;

        return $this;
    }

    /**
     * Outputs the label for the input field
     * @return string
     */
    private function generateHoneypotLabel() : string
    {
        $HTML = '<label for="' . $this->id . '">'   . "\n\r";
        $HTML .= "\t" . $this->label                . "\n\r";
        $HTML .= '</label>'                         . "\n\r";

        return $HTML;
    }

    /**
     * Outputs the input for the input field
     * @return string
     */
    private function generateHoneypotInput() : string
    {
        // All the properties used by the field
        $properties = array();
        $attributes = array(
            'type',
            'name',
            'class',
            'id',
            'placeholder',
            'minlength',
            'maxlength',
            'min',
            'max',
            'step',
            'autofocus',
            'autocomplete'
        );

        // Parsing through all the attributes and building the properties array
        foreach ($attributes as $attribute) {

            // Validating if the attribute is enabled and not empty
            if ((($this->$attribute != null) || ($this->$attribute != false)) && !empty($this->$attribute)) {
                $properties[] = $attribute . '="' . $this->$attribute . '"';
            }
        }

        return '<input '. implode( ' ', $properties) .'\>' . "\n\r";
    }

    public function generateDurationInput() : string
    {

    }
}