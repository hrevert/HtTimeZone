<?php
namespace HtTimeZone\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use HtTimeZone\Provider\MaxmindProvider;

class MaxmindTimeZoneProviderFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new MaxmindProvider($serviceLocator->get('geoip')->getRecord());
    }    
}
