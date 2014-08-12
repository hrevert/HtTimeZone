<?php
namespace HtTimeZone\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;

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
