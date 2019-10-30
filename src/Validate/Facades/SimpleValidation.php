<?php

namespace mikevandiepen\utility\Validate\Facades;

use mikevandiepen\utility\Response;
use mikevandiepen\utility\Translator\Translator;
use mikevandiepen\utility\Validate\Validation;

class SimpleValidation
{
    /**
     * Current validation rule
     * @var string
     */
    private $rule;

    /**
     * The field which is being validated
     * @var
     */
    private $field;

    /**
     * The values which the user has entered
     * @var array
     */
    private $values     = array();

    /**
     * The thresholds where the value should be compared by
     * @var array
     */
    private $thresholds = array();

    /**
     * The outcome of the current validation
     * @var bool
     */
    private $result     = false;

    /**
     * The response class will be stored in here and used for error handling
     * @var Response
     */
    private $response;

    /**
     * The translation class will be stored in here and is used for getting the translations
     * @var Translator
     */
    private $translation;

    /**
     * Language for the response messages
     * @var string
     */
    private $language = 'default';

    /**
     * SimpleValidation constructor.
     *
     * @param string $language
     */
    public function __construct(string $language = 'default')
    {
        $this->response     = new Response();
        $this->translation  = new Translator($language);
    }

    /**
     * The name or alias of the rule
     * @param string $rule
     *
     * @return SimpleValidation
     */
    public function rule(string $rule) : self
    {
        return $this;
    }

    /**
     * Executing the validation rule
     * @return SimpleValidation
     */
    public function validate() : self
    {
        // Transforming the string to lowercase to be more flexible to the end user
        switch (strtolower($this->rule)) {

            // Basic validation
            case 'required':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\Basic\Required($this->values, $this->thresholds)
                ))->validate();
                break;

            // Type validation
            case 'num':
            case 'numeric':
                $this->result = (boolean) (new Validation(
                    new  \mikevandiepen\utility\Validate\Rules\Types\TypeNumeric($this->values, $this->thresholds)
                ))->validate();
                break;

            case 'float':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\Types\TypeFloat($this->values, $this->thresholds)
                ))->validate();
                break;

            case 'bool':
            case 'boolean':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\Types\TypeBoolean($this->values, $this->thresholds)
                ))->validate();
                break;

            case 'int':
            case 'integer':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\Types\TypeInteger($this->values, $this->thresholds)
                ))->validate();
                break;

            case 'null':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\Types\TypeNull($this->values, $this->thresholds)
                ))->validate();
                break;

            case 'string':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\Types\TypeString($this->values, $this->thresholds)
                ))->validate();
                break;

            case 'array':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\Types\TypeArray($this->values, $this->thresholds)
                ))->validate();
                break;

            // Date validation
            case 'before_date':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\Date\Before($this->values, $this->thresholds)
                ))->validate();
                break;

            case 'after_date':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\Date\After($this->values, $this->thresholds)
                ))->validate();
                break;

            case 'between_dates':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\Date\Between($this->values, $this->thresholds)
                ))->validate();
                break;

            // String validation
            case 'starts_with':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\String\StartsWith($this->values, $this->thresholds)
                ))->validate();
                break;

            case 'ends_with':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\String\EndsWith($this->values, $this->thresholds)
                ))->validate();
                break;

            case 'contains':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\String\Contains($this->values, $this->thresholds)
                ))->validate();
                break;

            case 'regex':
            case 'expression':
            case 'regular_expression':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\String\Regex($this->values, $this->thresholds)
                ))->validate();
                break;

            case 'exact_length':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\String\ExactLength($this->values, $this->thresholds)
                ))->validate();
                break;

            case 'minlen':
            case 'min_length':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\String\MinLength($this->values, $this->thresholds)
                ))->validate();
                break;

            case 'maxlen':
            case 'max_length':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\String\MaxLength($this->values, $this->thresholds)
                ))->validate();
                break;

            // String types
            case 'email':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\String\Email($this->values, $this->thresholds)
                ))->validate();
                break;

            case 'url':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\String\Url($this->values, $this->thresholds)
                ))->validate();
                break;

            case 'domain':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\String\Domain($this->values, $this->thresholds)
                ))->validate();
                break;

            case 'ip':
            case 'ip_address':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\String\IPAddress($this->values, $this->thresholds)
                ))->validate();
                break;

            case 'ipv4':
            case 'ipv4_address':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\String\IPV4Address($this->values, $this->thresholds)
                ))->validate();
                break;

            case 'ipv6':
            case 'ipv6_address':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\String\IPV6Address($this->values, $this->thresholds)
                ))->validate();
                break;

            case 'mac':
            case 'mac_address':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\String\MACAddress($this->values, $this->thresholds)
                ))->validate();
                break;

            // Numeric validation
            case 'between':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\Numeric\Between($this->values, $this->thresholds)
                ))->validate();
                break;

            case 'min':
            case 'minimum':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\Numeric\Min($this->values, $this->thresholds)
                ))->validate();
                break;

            case 'max':
            case 'maximum':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\Numeric\Max($this->values, $this->thresholds)
                ))->validate();
                break;

            case 'equal':
            case 'equals':
            case 'equal_to':
            case 'equals_to':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\Numeric\Equal($this->values, $this->thresholds)
                ))->validate();
                break;

            case 'not_equal':
            case 'not_equal_to':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\Numeric\NotEqual($this->values, $this->thresholds)
                ))->validate();
                break;

            case 'gt':
            case 'greater_than':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\Numeric\GreaterThan($this->values, $this->thresholds)
                ))->validate();
                break;

            case 'gte':
            case 'greater_than_or_equal_to':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\Numeric\GreaterThanOrEqualTo($this->values, $this->thresholds)
                ))->validate();
                break;

            case 'lt':
            case 'less_than':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\Numeric\LessThan($this->values, $this->thresholds)
                ))->validate();
                break;

            case 'lte':
            case 'less_than_or_equal_to':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\Numeric\LessThanOrEqualTo($this->values, $this->thresholds)
                ))->validate();
                break;

            // File validation
            case 'allowed_extensions':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\File\AllowedExtensions($this->values, $this->thresholds)
                ))->validate();
                break;

            case 'allowed_mime_types':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\File\AllowedMimeTypes($this->values, $this->thresholds)
                ))->validate();
                break;

            case 'max_size':
            case 'max_file_size':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\File\MaxFileSize($this->values, $this->thresholds)
                ))->validate();
                break;

            // Email validation
            case 'allowed_providers':
            case 'allowed_email_providers':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\Email\AllowedProviders($this->values, $this->thresholds)
                ))->validate();
                break;

            case 'blocked_providers':
            case 'blocked_email_providers':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\Email\BlockedProviders($this->values, $this->thresholds)
                ))->validate();
                break;

            // Payment validation
            case 'cc':
            case 'credit_card':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\Payment\CreditCard($this->values, $this->thresholds)
                ))->validate();
                break;

            case 'iban':
                $this->result = (boolean) (new Validation(
                    new \mikevandiepen\utility\Validate\Rules\Payment\IBAN($this->values, $this->thresholds)
                ))->validate();
                break;

            //--------------------------------------------------------------------------------------------------
            // More validation rules can be added here
            //--------------------------------------------------------------------------------------------------
            //
            //  EXAMPLE:
            //
            //  case 'rule':
            //      $this->result = (boolean) (new Validation(
            //          new \mikevandiepen\utility\Validate\Rules\RuleType\RuleName($this->values, $this->thresholds))
            //      )->validate();
            //  break;
            //
            //--------------------------------------------------------------------------------------------------
        }

        return $this;
    }

    /**
     * Whether the validation passes
     * @return bool
     */
    public function passes() : bool
    {
        return $this->result;
    }

    /**
     * Returns the response messages
     * @return string
     */
    public function response() : string
    {
        if ($this->result === false || $this->result !== true) {

            $message    = $this->translation->get($this->rule);
            $attributes = $this->getAttributes(
                $this->field,
                $this->values,
                $this->thresholds
            );

            // Adding delimiters to the attributes
            $this->response->delimiters('<strong>', '</strong>');

            // The validation returned false; now the error message will be collected
            $this->response->add($message, $attributes, Response::ERROR);
        }
    }
}
