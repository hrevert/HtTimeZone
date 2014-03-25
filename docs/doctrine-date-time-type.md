If you use doctrine DBAL, then you can use DBAL types provided this module which automate timezone conversion.

## Included DBAL types
1. [HtTimeZone\DBAL\Types\UTCDateTimeType](https://github.com/hrevert/HtTimeZone/tree/master/src/HtTimeZone/DBAL/Types/UTCDateTimeType.php)  
3. [HtTimeZone\DBAL\Types\UTCTimeType](https://github.com/hrevert/HtTimeZone/tree/master/src/HtTimeZone/DBAL/Types/UTCTimeType.php)

## Usage

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
Suppose you want to store other timezone (NOT UTC), say `Asia/Kathmandu`.

```php
<?php
namespace Application\DBAL\Types;

use DateTimeZone;

class KtmDateTimeType extends AbstractTimeZoneDateTimeType
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
                    'ktmdatetime' => 'Application\DBAL\Types\KtmDateTimeType',
                ],
            ]
        ],
    ],
];
```
