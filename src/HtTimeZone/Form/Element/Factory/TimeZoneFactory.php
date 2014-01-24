<?php
namespace HtTimeZone\Form\Element\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use HtTimeZone\Form\Element\TimeZone;

class TimeZoneFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $element = new TimeZone();
        $element->setTimeZones($serviceLocator->get('HtTimeZone\TimeZoneService')->getTimeZoneOptions());

        return $element;
    }
}
