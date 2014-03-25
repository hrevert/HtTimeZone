<?php
namespace HtTimeZoneTest\Filter;

use HtTimeZone\Filter\TimeZoneConverter;

class TimeZoneConverterTest extends \PHPUnit_Framework_TestCase
{
    public function testSettersAndGetters()
    {
        $fromTimeZone = new \DateTimeZone('UTC'); 
        $toTimeZone = new \DateTimeZone('Asia/Kathmandu');
        $filter = new TimeZoneConverter();
        $filter->setOptions([
            'input_format' => 'd/m/Y',
            'output_format' => 'Y-m-d',
            'from_time_zone' => $fromTimeZone,
            'to_time_zone' => $toTimeZone
        ]);
        $this->assertEquals('d/m/Y', $filter->getInputFormat());           
        $this->assertEquals('Y-m-d', $filter->getOutputFormat());           
        $this->assertEquals($fromTimeZone, $filter->getFromTimeZone());           
        $this->assertEquals($toTimeZone, $filter->getToTimeZone());           
    }

    public function testInputFormatAndOutputFormat()
    {
        $filter = new TimeZoneConverter(new \DateTimeZone('UTC'), new \DateTimeZone('UTC'));
        $filter->setOutputFormat('Y-m-d');
        $filter->setInputFormat('m d/Y');
        $this->assertEquals('2014-03-03', $filter->filter('03 03/2014'));
    }

    public function testConvertTimeZone()
    {
        $filter = new TimeZoneConverter(new \DateTimeZone('Asia/Kathmandu'), new \DateTimeZone('UTC'));
        $input = new \DateTime('now', new \DateTimeZone('Asia/Kathmandu'));
        $output = clone $input;
        $output->sub(\DateInterval::createFromDateString('5 hours + 45 minutes'));
        $this->assertEquals($output->format('h i a'), $filter($input)->format('h i a'));
    }
}
