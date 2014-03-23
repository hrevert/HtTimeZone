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
];
