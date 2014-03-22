<?php
namespace HtTimeZone\Filter\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use HtTimeZone\Filter\ServerToClientTimeZone;

class ServerToClientTimeZoneFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $filters)
    {
        $serviceLocator = $filters->getServiceLocator();
        $options = $serviceLocator->get('HtTimeZone\ModuleOptions');

        return new ServerToClientTimeZone(
            $serviceLocator->get('HtTimeZone\TimeZoneService')->getClientTimeZone(),
            $options->getServerTimeZone()
        );
    }
}
