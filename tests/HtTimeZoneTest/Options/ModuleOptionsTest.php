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
            'asdfasf' => 'asdfsdf',
            'server_time_zone' => 'Asia/Kathmandu',// test strict mode

        ));
        $this->assertEquals('Asia/Kathmandu', $moduleOptions->getDefaultClientTimeZone()->getName());
        $this->assertEquals(DateTimeZone::EUROPE, $moduleOptions->getRegion());
        $this->assertEquals('Asia/Kathmandu', $moduleOptions->getServerTimeZone()->getName());
    }
}
