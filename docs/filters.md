Filters
===============
This module comes with some filters related to timezone. If you don`t know filters, [this](http://framework.zend.com/manual/2.3/en/modules/zend.filter.html) should be the first one to read.

## Included filters
1. [HtTimeZone\Filter\TimeZoneConverter](../src/Filter/TimeZoneConverter.php)
2. [HtTimeZone\Filter\ClientToServerTimeZone](../src/Filter/ClientToServerTimeZone.php)
3. [HtTimeZone\Filter\ServerToClientTimeZone](../src/Filter/ServerToClientTimeZone.php)

## Usage
1. `HtTimeZone\Filter\TimeZoneConverter`
This filter is pretty simple. 
```php
$filter = new HtTimeZone\Filter\TimeZoneConverter($fromTimeZone, $toTimeZone);
echo $filter->filter(new DateTime());
```
To get more understanding of how this filter works, the best way is to dig the code [here](../src/Filter/TimeZoneConverter.php).

2. `HtTimeZone\Filter\ServerToClientTimeZone`
```php
$filter = $this->getServiceLocator()->get('FilterManager')->get('ServerToClientTimeZone');
echo $filter->filter(new DateTime());
```

3. `HtTimeZone\Filter\ClientToServerTimeZone`
```php
$filter = $this->getServiceLocator()->get('FilterManager')->get('ClientToServerTimeZone');
echo $filter->filter(new DateTime());
```