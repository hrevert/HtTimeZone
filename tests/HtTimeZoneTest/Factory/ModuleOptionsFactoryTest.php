<?php
namespace HtTimeZoneTest\Factory;

use Zend\ServiceManager\ServiceManager;
use HtTimeZone\Factory\ModuleOptionsFactory;

class ModuleOptionsFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testFactory()
    {
        $serviceManager = new ServiceManager;
        $serviceManager->setService('Config', ['ht_time_zone' => []]);
        $factory = new ModuleOptionsFactory;
        $this->assertInstanceOf('HtTimeZone\Options\ModuleOptions', $factory->createService($serviceManager));
    }
}
