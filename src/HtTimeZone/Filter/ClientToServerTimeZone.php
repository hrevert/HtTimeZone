<?php
namespace HtTimeZone\Filter;

use DateTimeZone;

class ClientToServerTimeZone extends TimeZoneConverter
{
    public function __construct(DateTimeZone $clientTimeZone, DateTimeZone $serverTimeZone)
    {
        $this->setFromTimeZone($clientTimeZone);
        $this->setToTimeZone($serverTimeZone);
    }
}
