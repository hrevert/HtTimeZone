<?php
namespace HtTimeZone\Filter;

use DateTimeZone;

class ServerToClientTimeZone extends TimeZoneConverter
{
    public function __construct(DateTimeZone $clientTimeZone, DateTimeZone $serverTimeZone)
    {
        $this->setFromTimeZone($serverTimeZone);
        $this->setToTimeZone($clientTimeZone);
    }
}
