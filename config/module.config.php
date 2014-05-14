<?php
return [
    'doctrine' => [
        'configuration' => [
            'orm_default' => [
                'types' => [
                    'utcdatetime' => 'HtTimeZone\DBAL\Types\UTCDateTimeType',
                    'utcdate'     => 'HtTimeZone\DBAL\Types\UTCDateType',
                    'utctime'     => 'HtTimeZone\DBAL\Types\UTCTimeType',
                    'timezone'    => 'HtTimeZone\DBAL\Types\TimeZoneType',
                ],
            ]
        ],
    ],
    'ht_time_zone' => [],
    'router' => [
        'routes' => [
            'HtTimeZone' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/timezone',
                ]
                'may_terminate' => true,
                'child_routes' => [
                    'Record' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => '/record/:timezone',
                            'defaults' => [
                                'controller' => 'HtTimeZone\Controller\TimeZoneController',
                                'action' => 'record'
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ],
    'controllers' => [
        'factories' => [
            'HtTimeZone\Controller\TimeZoneController' => 'HtTimeZone\Factory\Controller\TimeZone'
        ]
    ]
];
