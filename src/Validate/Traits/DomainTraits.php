<?php

namespace Mediadevs\FormAssist\Validate\Traits;

trait DomainTraits
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

    /**
     * Pinging the hostname to see if it is live / an actual working hostname
     * @param string $host
     *
     * @return bool
     */
    protected function checkWhetherHostIsLive(string $host) : bool
    {
        /**
         * Todo: Find a library / method (Possibly Guzzle / Curl) to validate whether the hostname is live
         * and actually exists
         */
        return false;
    }
}
