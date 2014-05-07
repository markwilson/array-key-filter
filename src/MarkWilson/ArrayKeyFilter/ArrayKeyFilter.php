<?php

namespace MarkWilson\ArrayKeyFilter;

/**
 * Filter arrays by key
 *
 * @package MarkWilson
 * @author  Mark Wilson <mark@89allport.co.uk>
 */
class ArrayKeyFilter
{
    /**
     * Array to filter
     *
     * @var array|\ArrayAccess
     */
    private $arrayToFilter;

    /**
     * Constructor.
     *
     * @param array|\ArrayAccess $arrayToFilter Array to be filtered
     */
    public function __construct($arrayToFilter)
    {
        if (!is_array($arrayToFilter) && !$arrayToFilter instanceof \ArrayAccess) {
            throw new \InvalidArgumentException('ArrayKeyFilter expects an array or ArrayAccess');
        }

        $this->arrayToFilter = $arrayToFilter;
    }

    /**
     * Filter an array by it's keys
     *
     * @param callable $filterFunction Callable filter function - should return true/false
     *
     * @return array
     */
    public function filter(Callable $filterFunction)
    {
        $filteredArray = [];

        foreach ($this->arrayToFilter as $key => $value) {
            if ($filterFunction($key)) {
                $filteredArray[$key] = $value;
            }
        }

        return $filteredArray;
    }

    /**
     * Filter by pattern
     *
     * @param string $pattern Regular expression
     *
     * @return array
     */
    public function filterByPattern($pattern)
    {
        return $this->filter(function ($key) use ($pattern) {
            return preg_match($pattern, $key);
        });
    }
}
