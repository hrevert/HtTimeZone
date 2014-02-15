<?php

namespace HtTimeZoneTest;

use HtTimeZone\Module;


class ModuleTest extends \PHPUnit_Framework_TestCase
{
    protected $module;

    public function setUp()
    {
        $this->module = new Module();
    }

    public function testConfigIsArray()
    {
        $this->assertInternalType('array', $this->module->getConfig());
    }

    public function testServiceConfigIsArray()
    {
        $this->assertInternalType('array', $this->module->getServiceConfig());
    }

    public function testViewHelperConfigIsArray()
    {
        $this->assertInternalType('array', $this->module->getViewHelperConfig());
    }
}
