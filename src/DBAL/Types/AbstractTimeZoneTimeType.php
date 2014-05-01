<?php
namespace HtTimeZone\DBAL\Types;

abstract class AbstractTimeZoneTimeType extends AbstractTimeZoneDateTimeType
{
    /**
     * {@inheritDoc}
     */
    protected function getFormat(AbstractPlatform $platform)
    {
        return $platform->getTimeFormatString();
    }
}
