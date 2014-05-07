<?php

namespace MarkWilson\ArrayKeyFilter;

use MarkWilson\ArrayFiltering\FilterInterface;

/**
 * Filter arrays by pattern match on the key
 *
 * @package MarkWilson
 * @author  Mark Wilson <mark@89allport.co.uk>
 */
class KeyPatternFilter implements FilterInterface
{
    /**
     * Regular expression pattern
     *
     * @var string
     */
    private $pattern;

    /**
     * Constructor.
     *
     * @param string $pattern Regular expression
     */
    public function __construct($pattern)
    {
        if (!is_string($pattern)) {
            throw new \InvalidArgumentException('Invalid parameter provided');
        }

        if (false === preg_match($pattern, null)) {
            throw new \InvalidArgumentException('Invalid regular expression provided');
        }
        $this->pattern = $pattern;
    }

    /**
     * Check if the filter is satisfied by the specified values
     *
     * @param string|integer $key   Item key
     * @param mixed          $value Item value
     *
     * @return boolean
     */
    public function isSatisfiedBy($key, $value)
    {
        return preg_match($this->pattern, $key);
    }
}
