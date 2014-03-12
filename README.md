HtTimeZone
==========

HtTimeZone is a Zend Framework 2 module to simplify working with timezones. This module is useful when your application users are located all around the world.
To use this module you will have to store all the dates in a fixed timezone(UTC is recommended). This module will provide a view helper to display datetime according to user`s timezone.


### Installation
1. Add `"hrevert/ht-time-zone": "dev-master",` to your composer.json and run `php composer.phar update` 
2. Enable the module in `config/application.config.php`
3. Copy file located in `./vendor/hrevert/ht-time-zone/config/ht-time-zone.global.php` to `./config/autoload/ht-time-zone.global.php` and change the values as you wish

For more details on how to use this module, please check this [wiki](https://github.com/hrevert/HtTimeZone/wiki) .

