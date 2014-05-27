HtTimeZone
==========

HtTimeZone is a Zend Framework 2 module to simplify working with timezones. This module is useful when your application users are located all around the world.
To use this module you will have to store all the dates in a fixed timezone(UTC is recommended).


## Installation
1. Add `"hrevert/ht-time-zone": "dev-master",` to your composer.json and run `php composer.phar update` 
2. Enable the module in `config/application.config.php`
3. Copy file located in `./vendor/hrevert/ht-time-zone/config/ht-time-zone.global.php` to `./config/autoload/ht-time-zone.global.php` and change the values as you wish

## Documentation

### Doctrine Types
If you use doctrine DBAL, then you can use DBAL types provided this module which automate timezone conversion.

#### Included DBAL types
1. [`HtTimeZone\DBAL\Types\UTCDateTimeType`](https://github.com/hrevert/HtTimeZone/tree/master/src/DBAL/Types/UTCDateTimeType.php)
2. [`HtTimeZone\DBAL\Types\UTCTimeType`](https://github.com/hrevert/HtTimeZone/tree/master/src/DBAL/Types/UTCTimeType.php)
3. [`HtTimeZone\DBAL\Types\TimeZoneType`](https://github.com/hrevert/HtTimeZone/tree/master/src/DBAL/Types/TimeZoneType.php)

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

Suppose, you want to store user's timezone;
```php
<?php
/**
 * @Entity
 * @Table(name="user)
 */
class User
{
    ...
 
    /**
     * @Column(type="TimeZone")
     * @var DateTimeZone
     */
     protected $timeZone;
 
    ...
} 
```

Suppose you want to store time in other timezone (NOT UTC), say `Asia/Kathmandu`.

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
### Filters

This module comes with some filters related to timezone. If you don`t know filters, [this](http://framework.zend.com/manual/2.3/en/modules/zend.filter.html) should be the first one to read.

#### Included filters
1. [HtTimeZone\Filter\TimeZoneConverter](../src/HtTimeZone/Filter/TimeZoneConverter.php)
2. `ClientToServerTimeZone`
3. `ServerToClientTimeZone`

#### Usage
###### HtTimeZone\Filter\TimeZoneConverter

This filter is pretty simple. 
```php
$filter = new HtTimeZone\Filter\TimeZoneConverter($fromTimeZone, $toTimeZone);
echo $filter->filter(new DateTime());
```

To get more understanding of how this filter works, the best way is to dig the code [here](/src/HtTimeZone/Filter/TimeZoneConverter.php).

###### HtTimeZone\Filter\ServerToClientTimeZone

```php
$filter = $this->getServiceLocator()->get('FilterManager')->get('ServerToClientTimeZone');
echo $filter->filter(new DateTime());
```

###### HtTimeZone\Filter\ClientToServerTimeZone

```php
$filter = $this->getServiceLocator()->get('FilterManager')->get('ClientToServerTimeZone');
echo $filter->filter(new DateTime());
```

### Using View Helpers

This module comes with two view helpers to make our life easier.

1. htTimeZone
2. htTimeInterval

#### Basic Usage
##### htTimeZone
This view helper sets timezone of a DateTime instance to that of client's timezone. Thats it!
This view helper is useful to display date in client's timezone!
```php
$dateTime = new DateTime();
echo $this->htTimeZone($dateTime)->format('d/m/Y H:i');// will print according to user`s timezone
```
##### htTimeInterval
This view helper is to display something like `5 minutes ago`.
```php
echo $this->htTimeInterval(new DateTime()); // will print `Just Now`
echo $this->htTimeInterval(time() - 10); // will print `10 seconds ago`
```

### Hydrator Strategies
1. [`HtTimeZone\Stdlib\Hydrator\Strategy\TimeZoneConverter`](/src/Stdlib/Hydrator/Strategy/TimeZoneConverter.php)
2. [`HtTimeZone\Stdlib\Hydrator\Strategy\TimeZoneStringStrategy`](/src/Stdlib/Hydrator/Strategy/TimeZoneStringStrategy.php)

### WIP
This is a work in progress. Use at your own risk!
