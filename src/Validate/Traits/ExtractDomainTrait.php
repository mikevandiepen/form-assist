<?php

namespace mikevandiepen\utility\Validate\Traits;

trait ExtractDomainTrait
{
    /**
     * Uses regex to extract the domain name + tld from an email address
     * @param string $email
     *
     * @return string
     */
    protected function extractDomainFromEmail(string $email) : string
    {
        return substr($email, strpos($email, '@') + 1);
    }
}