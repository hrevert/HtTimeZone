<?php
namespace HtTimeZone;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return [
            'Zend\Loader\ClassMapAutoloader' => [
                __DIR__ . '/../../autoload_classmap.php',
            ],
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__
                ],
            ],
        ];
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                'HtTimeZone\TimeZoneService' => 'HtTimeZone\Factory\TimeZoneServiceFactory',
                'HtTimeZone\ModuleOptions' => 'HtTimeZone\Factory\ModuleOptionsFactory',
                'HtTimeZone\ZfcUserTimeZoneProvider' => 'HtTimeZone\Factory\ZfcUserTimeZoneProviderFactory',
            ],
            'aliases' => [
                'HtTimeZone\ClientTimeZoneProvider' => 'HtTimeZone\ZfcUserTimeZoneProvider',
            ]
        ];
    }

    public function getViewHelperConfig()
    {
        return [
            'invokables' => [
                'HtTimeZone\View\Helper\TimeInterval' => 'HtTimeZone\View\Helper\TimeInterval'
            ],
            'factories' => [
                'HtTimeZone\View\Helper\TimeZone' => 'HtTimeZone\View\Helper\Factory\TimeZoneFactory',
            ],
            'aliases' => [
                'HtTimeZone' => 'HtTimeZone\View\Helper\TimeZone',
                'HtTimeInterval' => 'HtTimeZone\View\Helper\TimeInterval',
            ]
        ];
    }
}
