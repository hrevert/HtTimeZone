<?php
namespace HtTimeZone\Filter;

use DateTimeZone;

class ServerToClientTimeZone extends TimeZoneConverter
{
    public function __construct(DateTimeZone $serverTimeZone, DateTimeZone $clientTimeZone)
    {
        $this->setFromTimeZone($serverTimeZone);
        $this->setToTimeZone($clientTimeZone);
    }
}
