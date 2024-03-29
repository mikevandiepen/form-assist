<?php

namespace Mediadevs\FormAssist\Sanitize\Filters;

use mysqli;
use Mediadevs\FormAssist\Sanitize\SanitizationInterface;

class SanitizeSQL extends Filter implements SanitizationInterface
{
    /**
     * SanitizationInterface constructor.
     *
     * @param             $input
     * @param null|mysqli $link
     */
    public function __construct($input, $link = null)
    {
        parent::__construct($input, $link);
    }

    /**
     * Validating the attribute
     * @return string
     */
    public function sanitize() : string
    {
        // If $this->link is not set an alternative method will be applied
        if (!empty($this->link) || $this->link) {
            $escapedString = mysqli_real_escape_string($this->link, $this->input);
         } else {

            /** @author Trevor Herselman! (line:44 until line:49) */
            if (function_exists('mb_ereg_replace')) {
                $escapedString = mb_ereg_replace('[\x00\x0A\x0D\x1A\x22\x27\x5C]', '\\\0', $this->input);
            } else {
                $escapedString = preg_replace('~[\x00\x0A\x0D\x1A\x22\x27\x5C]~u', '\\\$0', $this->input);
            }
        }

        return  $escapedString;
    }
}
