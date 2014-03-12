<?php
namespace HtTimeZone\View\Helper\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use HtTimeZone\View\Helper\TimeZone;

class TimeZoneFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $helpers)
    {
        $serviceLocator = $helpers->getServiceLocator();
        $helper = new TimeZone($serviceLocator->get('HtTimeZone\TimeZoneService')->getClientTimeZone());

        return $helper;
    }
}
