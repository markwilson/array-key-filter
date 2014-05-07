<?php

namespace MarkWilson\ArrayKeyFilter\Tests;

use MarkWilson\ArrayKeyFilter\ArrayKeyFilter;

/**
 * Tests ArrayKeyFilter
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
    public function testFilterByPattern(array $expected, array $data, $pattern)
    {
        $filter = new ArrayKeyFilter($data);

        $this->assertEquals($expected, $filter->filterByPattern($pattern));
    }

    public function getFilterByPatternData()
    {
        return [
            [['testing' => 'testing', 'testing2' => 'testing'], ['testing' => 'testing', 'testing2' => 'testing', 'trkdjng' => 'testing'], '/^testing/']
        ];
    }
}
