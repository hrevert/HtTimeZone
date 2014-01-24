<?php
namespace HtTimeZone\View\Helper\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use HtTimeZone\View\Helper\HtTimeZone;

class HtTimeZoneFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $helpers)
    {
        $htTimeZoneHelper = new HtTimeZone();
        $serviceLocator = $helpers->getServiceLocator();
        $htTimeZoneHelper->setTimeZone($serviceLocator->get('HtTimeZone\TimeZoneService')->getTimeZone());

        return $htTimeZoneHelper;
    }
}
