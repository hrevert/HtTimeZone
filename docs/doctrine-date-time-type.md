UTCDateTimeType
===================
If you use Doctrine DBAL and you want to store user`s data in the same timezone, this module also comes with `UTCDateTimeType`.

```php
/**
 * @Entity
 * @Table(name="myEvent)
 */
class Event
{
    ...
 
    /**
     * @Column(type="UTCDateTime")
     * @var DateTime
     */
     protected $datetime;
 
    ...
}
```
## Storing time in other timezones(NOT UTC)
Lets say you want to store user`s time zone in the same timezone(NOT UTC), say `Asia/Kathmandu`.

```php
<?php
namespace Application\DBAL\Types;

use DateTimeZone;

class KtmDateTimeType extends AbstractTimeZoneDateType
{
    /**
     * @var null|DateTimeZone 
     */
    static private $dateTimeZone = null;

    /**
     * {@inheritDoc}
     */
    protected function getDateTimeZone()
    {
        return (self::$dateTimeZone) ? self::$dateTimeZone : (self::$dateTimeZone = new DateTimeZone('Asia/Kathmandu'));
    }
}

```

```php
return [
    'doctrine' => [
        'configuration' => [
            'orm_default' => [
                'types' => [
                    'ktmdatetime' => 'HtTimeZone\DBAL\Types\KtmDateTimeType',
                ],
            ]
        ],
    ],
];
```