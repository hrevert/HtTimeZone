<?php
namespace HtTimeZone\DBAL\Types;

use DateTimeZone;

class UTCTimeType extends AbstractTimeZoneTimeType
{
    /**
     * @var null|DateTimeZone 
     */
    static private $utc = null;

    /**
     * {@inheritDoc}
     */
    protected function getDateTimeZone()
    {
        return (self::$utc) ? self::$utc : (self::$utc = new DateTimeZone('UTC'));
    }
}
