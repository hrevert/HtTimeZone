<?php
namespace HtTimeZoneTest\Factory;

use Zend\ServiceManager\ServiceManager;
use HtTimeZone\Factory\MaxmindTimeZoneProviderFactory;
use ZfSnapGeoip\Entity\Record;

class MaxmindTimeZoneProviderFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testFactory()
    {
        $serviceManager = new ServiceManager;
        $geoipService = $this->getMock('ZfSnapGeoip\Service\Geoip');
        $geoipService->expects($this->once())
            ->method('getRecord')
            ->will($this->returnValue(new Record));
        $serviceManager->setService('geoip', $geoipService);
        $factory = new MaxmindTimeZoneProviderFactory;
        $this->assertInstanceOf('HtTimeZone\Provider\MaxmindProvider', $factory->createService($serviceManager));        
    }
}
