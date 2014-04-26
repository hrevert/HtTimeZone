<?php
namespace HtTimeZoneTest\Stdlib\Hydrator\Strategy;

use HtTimeZone\Stdlib\Hydrator\Strategy\TimeZoneStringStrategy;
use DateTimeZone;

class TimeZoneStringStrategyTest extends \PHPUnit_Framework_TestCase
{
    protected $strategy;

    public function setUp()
    {
        $this->strategy = new TimeZoneStringStrategy;
    }

    public function testHydrate()
    {
        $dateTimeZone = new DateTimeZone('Asia/Kathmandu');
        $this->assertEquals($dateTimeZone, $this->strategy->hydrate($dateTimeZone));
        $this->assertEquals($dateTimeZone, $this->strategy->hydrate('Asia/Kathmandu'));
        $this->setExpectedException('HtTimeZone\Stdlib\Hydrator\Strategy\Exception\InvalidArgumentException');
        $this->strategy->hydrate(new \ArrayObject);
    }

    public function testExtract()
    {
        $dateTimeZone = new DateTimeZone('Asia/Kathmandu');
        $this->assertEquals($dateTimeZone->getName(), $this->strategy->extract($dateTimeZone));
        $this->assertEquals($dateTimeZone->getName(), $this->strategy->extract('Asia/Kathmandu'));
        $this->setExpectedException('HtTimeZone\Stdlib\Hydrator\Strategy\Exception\InvalidArgumentException');
        $this->strategy->extract(new \ArrayObject);
    }
}
