<?php
return [
    'doctrine' => [
        'configuration' => [
            'orm_default' => [
                'types' => [
                    'utcdatetime' => 'HtTimeZone\DBAL\Types\UTCDateTimeType',
                ],
            ]
        ],
    ],
    'ht_time_zone' => []
];
