<?php
namespace HtTimeZone\Filter\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use HtTimeZone\Filter\ClientToServerTimeZone;

class ClientToServerTimeZoneFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $filters)
    {
        $serviceLocator = $filters->getServiceLocator();
        $options = $serviceLocator->get('HtTimeZone\ModuleOptions');
        $filter = new ClientToServerTimeZone(
            $serviceLocator->get('HtTimeZone\TimeZoneService')->getClientTimeZone(),
            $options->get('getServerTimeZone')
        );

        return $filter;
    }
}
