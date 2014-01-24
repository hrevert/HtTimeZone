<?php
namespace HtTimeZone;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'shared' => array(
                'HtTimeZone\Form\Element\TimeZone' => false,
            ),
            'factories' => array(
                'HtTimeZone\TimeZoneService' => 'HtTimeZone\Factory\TimeZoneServiceFactory',
                'HtTimeZone\ModuleOptions' => 'HtTimeZone\Factory\ModuleOptionsFactory',
                'HtTimeZone\Form\Element\TimeZone' => 'HtTimeZone\Form\Element\Factory\TimeZoneFactory',
                'HtTimeZone\ZfcUserTimeZoneProvider' => 'HtTimeZone\Factory\ZfcUserTimeZoneProviderFactory',
            ),
            'aliases' => array(
                'HtTimeZone\TimeZoneProvider' => 'HtTimeZone\ZfcUserTimeZoneProvider',
            )
        );
    }

    public function getViewHelperConfig()
    {
        return array(
            'factories' => array(
                'HtTimeZone' => 'HtTimeZone\View\Helper\Factory\HtTimeZoneFactory',
            )
        );
    }
}
