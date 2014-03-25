<?php
namespace HtTimeZone\Filter\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use HtTimeZone\Filter\TimeZoneConverter;

class ServerToClientTimeZoneFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $filters)
    {
        $serviceLocator = $filters->getServiceLocator();
        $options = $serviceLocator->get('HtTimeZone\ModuleOptions');

        return new TimeZoneConverter(
            $options->getServerTimeZone()
            $serviceLocator->get('HtTimeZone\TimeZoneService')->getClientTimeZone(),            
        );
    }
}
