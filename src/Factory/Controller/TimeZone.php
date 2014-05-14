<?php
namespace HtTimeZone\Factory\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use HtTimeZone\Controller\TimeZoneController;

class TimeZone implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $controllers)
    {
        $serviceLocator = $controllers->getServiceLocator();

        return new TimeZoneController($serviceLocator->get('HtTimeZone\ClientSideTimeZoneDetectionService'));
    }    
}
