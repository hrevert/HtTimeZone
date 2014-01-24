<?php

namespace HtTimeZoneTest\Options;

use HtTimeZone\Options\ModuleOptions;

class ModuleOptionsTest extends \PHPUnit_Framework_TestCase
{
    protected $moduleOptions;

    public function setUp()
    {
        $this->moduleOptions = new ModuleOptions(array(
            'default_time_zone' => 'Asia/Kathmandu',
            'region' => DateTimeZone::EUROPE,
            'asdfasf' => 'asdfsdf', // test strict mode

        ));
    }

    public function testSettersAndGetters()
    {
        $this->assertEquals('Asia/Kathmandu', $this->moduleOptions->getDefaultTimeZone());
        $this->assertEquals(DateTimeZone::EUROPE, $this->moduleOptions->getRegion());
    }
}
