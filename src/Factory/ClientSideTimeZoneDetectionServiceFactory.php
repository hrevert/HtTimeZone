<?php
namespace HtTimeZone\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use HtTimeZone\Service\ClientSideTimeZoneDetectionService;

class ClientSideTimeZoneDetectionServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new ClientSideTimeZoneDetectionService($serviceLocator->get('HtTimeZone\ModuleOptions'));
    }    
}
