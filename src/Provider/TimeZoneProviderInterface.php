<?php

namespace HtTimeZone\Provider;

interface TimeZoneProviderInterface
{
    /**
     * This method should return timezone of client if found else false
     *
     * @return string|bool|null
     */
    public function getTimeZone();
}
