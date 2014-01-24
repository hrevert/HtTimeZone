<?php

namespace HtTimeZone\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use HtTimeZone\Service\TimeZone;

class TimeZoneServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $service = new TimeZone();
        $service->setServiceLocator($serviceLocator);

        return $service;
    }
}
