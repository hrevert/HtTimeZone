<?php
namespace HtTimeZone\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use HtTimeZone\Provider\ClientSideTimeZoneProvider;

class ClientSideTimeZoneProviderFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new TimeZoneController($serviceLocator->get('HtTimeZone\ClientSideTimeZoneDetectionService'));
    }    
}
