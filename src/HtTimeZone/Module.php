<?php
namespace HtTimeZone;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ModuleManager\Feature\ViewHelperProviderInterface;
use Zend\ModuleManager\Feature\FilterProviderInterface;

class Module implements
    AutoloaderProviderInterface,
    ConfigProviderInterface,
    ServiceProviderInterface,
    ViewHelperProviderInterface,
    FilterProviderInterface

{
    /**
     * {@inheritDoc}
     */
    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }

    /**
     * {@inheritDoc}
     */
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

    /**
     * {@inheritDoc}
     */
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

    /**
     * {@inheritDoc}
     */
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

    /**
     * {@inheritDoc}
     */
    public function getFilterConfig()
    {
        return [
            'factories' => [
                'ClientToServerTimeZone' => 'HtTimeZone\Filter\Factory\ClientToServerTimeZoneFactory',
                'ServerToClientTimeZone' => 'HtTimeZone\Filter\Factory\ServerToClientTimeZoneFactory',
            ],
            'invokables' => [
                'TimeZoneConverter' => 'HtTimeZone\Filter\TimeZoneConverter',
            ]
        ];
    }
}
