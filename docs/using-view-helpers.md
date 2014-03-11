Using View Helpers
====================
This module comes with two view helpers to make our life easier.

1. htTimeZone
2. htTimeInterval

## Basic Usage
#### htTimeZone
This view helper provides DateTimeZone object to DateTime instance. Thats it!
```php
$dateTime = new DateTime();
echo $this->htTimeZone($dateTime)->format('d/m/Y H:i');// will print according to user`s timezone
```
#### htTimeInterval
This view helper is to display something like `5 minutes ago`.
```php
$this->htTimeInterval(new DateTime()); // will print `Just Now`
$this->htTimeInterval(time() - 10); // will print `10 seconds ago`
```