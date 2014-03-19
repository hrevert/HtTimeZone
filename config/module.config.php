<?php
return [
    'doctrine' => [
        'configuration' => [
            'orm_default' => [
                'types' => [
                    'utcdatetime' => 'HtTimeZone\DBAL\Types\UTCDateTimeType',
                    'timezone' => 'HtTimeZone\DBAL\Types\TimeZoneType',
                ],
            ]
        ],
    ],
    'ht_time_zone' => [],
    'input_filters' => [
        'factories' => [
            'ClientToServerTimeZone' => 'HtTimeZone\Filter\Factory\ClientToServerTimeZoneFactory',
            'ServerToClientTimeZone' => 'HtTimeZone\Filter\Factory\ServerToClientTimeZoneFactory',
        ]
    ]
];
