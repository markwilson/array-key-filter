<?php

namespace MarkWilson\ArrayKeyFilter\Tests;

use MarkWilson\ArrayKeyFilter\KeyPatternFilter;

/**
 * Tests KeyPatternFilter
 *
 * @package MarkWilson\Tests
 * @author  Mark Wilson <mark@89allport.co.uk>
 */
class ArrayKeyFilterTest extends \PHPUnit_Framework_TestCase
{
    public function testFilter()
    {
        $this->markTestIncomplete();
    }

    /**
     * @dataProvider getFilterByPatternData
     */
    public function testFilterByPattern($expected, $key, $value, $pattern)
    {
        $filter = new KeyPatternFilter($pattern);

        $this->assertEquals($expected, $filter->isSatisfiedBy($key, $value));
    }

    public function getFilterByPatternData()
    {
        return [
            [true, 'testing', 'testing', '/^testing/'],
            [false, 'test', 'testing', '/^testing/']
        ];
    }
}
