<?php

namespace HtTimeZoneTest\Options;

use HtTimeZone\Options\ModuleOptions;
use DateTimeZone;

class ModuleOptionsTest extends \PHPUnit_Framework_TestCase
{
    public function testSettersAndGetters()
    {
        $moduleOptions = new ModuleOptions(array(
            'default_client_time_zone' => 'Asia/Kathmandu',
            'region' => DateTimeZone::EUROPE,
            'asdfasf' => 'asdfsdf',// test strict mode
            'server_time_zone' => 'Asia/Kathmandu',

        ));
        $this->assertEquals('Asia/Kathmandu', $moduleOptions->getDefaultClientTimeZone()->getName());
        $this->assertEquals(DateTimeZone::EUROPE, $moduleOptions->getRegion());
        $this->assertEquals('Asia/Kathmandu', $moduleOptions->getServerTimeZone()->getName());
    }

    public function testDefaults()
    {
        $moduleOptions = new ModuleOptions();
        $this->assertEquals(DateTimeZone::ALL, $moduleOptions->getRegion());
        $this->assertEquals('UTC', $moduleOptions->getServerTimeZone()->getName());
        $this->assertEquals(date_default_timezone_get(), $moduleOptions->getDefaultClientTimeZone()->getName());
    }
}
