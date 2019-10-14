<?php

namespace mikevandiepen\utility\Sanitize\Filters;

use mikevandiepen\utility\Sanitize\SanitizationInterface;

class Slugify implements SanitizationInterface
{
    /**
     * The input for sanitization
     * @var string
     */
    protected $input;

    /**
     * The link for the mysqli connection
     * @var
     */
    private $link;

    /**
     * SanitizationInterface constructor.
     *
     * @param      $input
     * @param null $link
     */
    public function __construct($input, ?$link = null)
    {
        $this->input = $input;
        $this->link = $link;
    }

    /**
     * Validating the attribute
     * @return string
     */
    public function sanitize() : string
    {
        $unwanted_array = [
            'ś' => 's',
            'ą' => 'a',
            'ć' => 'c',
            'ç' => 'c',
            'ę' => 'e',
            'ł' => 'l',
            'ń' => 'n',
            'ó' => 'o',
            'ź' => 'z',
            'ż' => 'z',
            'Ś' => 's',
            'Ą' => 'a',
            'Ć' => 'c',
            'Ç' => 'c',
            'Ę' => 'e',
            'Ł' => 'l',
            'Ń' => 'n',
            'Ó' => 'o',
            'Ź' => 'z',
            'Ż' => 'z'
        ];

        return strtolower(trim(
            preg_replace('/[\s-]+/', '-',
                         preg_replace('/[^A-Za-z0-9-]+/', '-',
                                      preg_replace('/[&]/', 'and',
                                                   preg_replace('/[\']/', '',
                                                                iconv('UTF-8', 'ASCII//TRANSLIT',
                                                                      strtr($this->input, $unwanted_array)
                                                                )
                                                   )
                                      )
                         )
            ), '-')
        );
    }
}