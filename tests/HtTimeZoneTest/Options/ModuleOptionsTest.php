<?php

namespace HtTimeZoneTest\Options;

use HtTimeZone\Options\ModuleOptions;
use DateTimeZone;

class ModuleOptionsTest extends \PHPUnit_Framework_TestCase
{
    public function testSettersAndGetters()
    {
        $moduleOptions = new ModuleOptions(array(
            'default_time_zone' => 'Asia/Kathmandu',
            'region' => DateTimeZone::EUROPE,
            'asdfasf' => 'asdfsdf', // test strict mode

        ));
        $this->assertEquals('Asia/Kathmandu', $moduleOptions->getDefaultTimeZone());
        $this->assertEquals(DateTimeZone::EUROPE, $moduleOptions->getRegion());
    }
}
