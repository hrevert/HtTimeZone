<?php
namespace HtTimeZoneTest\Factory;

use Zend\ServiceManager\ServiceManager;
use HtTimeZone\Factory\TimeZoneServiceFactory;

class TimeZoneServiceFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testFactory()
    {
        $serviceManager = new ServiceManager;
        $factory = new TimeZoneServiceFactory;
        $this->assertInstanceOf('HtTimeZone\Service\TimeZone', $factory->createService($serviceManager));
    }    
}
