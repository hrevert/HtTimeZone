<?php
namespace HtTimeZoneTest\Stdlib\Hydrator\Strategy;

use HtTimeZone\Stdlib\Hydrator\Strategy\TimeZoneConverter;

class TimeZoneConverterTest extends \PHPUnit_Framework_TestCase
{
    public function testHydrate()
    {
        $strategy = new TimeZoneConverter(new \DateTimeZone('Asia/Kathmandu'), new \DateTimeZone('UTC'));
        $input = new \DateTime('now', new \DateTimeZone('Asia/Kathmandu'));
        $output = clone $input;
        $output->sub(\DateInterval::createFromDateString('5 hours + 45 minutes'));
        $this->assertEquals($output->format('h i a'), $strategy->hydrate($input)->format('h i a'));
    }

    public function testExtract()
    {
        $strategy = new TimeZoneConverter(new \DateTimeZone('Asia/Kathmandu'), new \DateTimeZone('UTC'));
        $input = new \DateTime('now', new \DateTimeZone('UTC'));
        $output = clone $input;
        $output->add(\DateInterval::createFromDateString('5 hours + 45 minutes'));
        $this->assertEquals($output->format('h i a'), $strategy->extract($input)->format('h i a'));        
    }
}
