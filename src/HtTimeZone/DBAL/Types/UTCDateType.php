<?php
namespace HtTimeZone\DBAL\Types;

use DateTimeZone;

class UTCDateType extends AbstractTimeZoneDateType
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
