<?php
namespace HtTimeZone\DBAL\Types;

use DateTimeZone;

class UTCDateTimeType extends AbstractTimeZoneDateTimeType
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
