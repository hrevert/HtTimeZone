<?php

namespace HtTimeZone\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use HtTimeZone\Provider\ZfcUserTimeZoneProvider;

class ZfcUserTimeZoneProviderFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new ZfcUserTimeZoneProvider($serviceLocator->get('zfcuser_auth_service'));
    }
}
