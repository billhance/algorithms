<?php 

require_once('../search/BinarySearch.php');

use billhance\algorithms\search\BinarySearch;

class BinarySearchTest extends PHPUnit_Framework_TestCase 
{
    private $algorithm; 

    private $haystack = array('Art', 'Bill', 'Bob', 'Henry', 'Nick', 'Tom');

    public function setup()
    {
        $this->algorithm = new BinarySearch;
    }

    public function testMaxIsGreaterThanMin()
    {   
        $needle = $this->haystack[0];
        $min = 5; 
        $max = 4;
        $result = $this->algorithm->find($this->haystack, $needle, $min, $max);
        $this->assertLessThan(0, $result);
    }

    public function testItemNotInArray()
    {
        $needle = 'Zack';
        $min = 0; 
        $max = count($this->haystack) - 1;
        $result = $this->algorithm->find($this->haystack, $needle, $min, $max);
        $this->assertLessThan(0, $result);
    }

    public function testFoundWhenFirstItem() 
    {
        $min = 0; 
        $max = count($this->haystack) - 1;
        $needle = $this->haystack[$min];
        $result = $this->algorithm->find($this->haystack, $needle, $min, $max);
        $this->assertEquals($result, $min);
    }

    public function testFoundWhenLastItem() 
    {
        $min = 0; 
        $max = count($this->haystack) - 1;
        $needle = $this->haystack[$max];
        $result = $this->algorithm->find($this->haystack, $needle, $min, $max);
        $this->assertEquals($result, $max);
    }

    public function testFoundWhenMiddleItem()
    {
        $needle = 'Bob';
        $min = 0; 
        $max = count($this->haystack) - 1;
        $result = $this->algorithm->find($this->haystack, $needle, $min, $max);
        $this->assertEquals($result, 2);
    }
}