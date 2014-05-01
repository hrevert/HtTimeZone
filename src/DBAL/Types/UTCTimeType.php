<?php
namespace HtTimeZone\DBAL\Types;

use DateTimeZone;

class UTCTimeType extends AbstractTimeZoneTimeType
{
    /**
     * @var null|DateTimeZone
     */
    private static $utc = null;

    /**
     * {@inheritDoc}
     */
    protected function getDateTimeZone()
    {
        return (self::$utc) ? self::$utc : (self::$utc = new DateTimeZone('UTC'));
    }
}
