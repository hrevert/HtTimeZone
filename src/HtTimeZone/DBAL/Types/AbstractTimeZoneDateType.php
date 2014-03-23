<?php
namespace HtTimeZone\DBAL\Types;

abstract class AbstractTimeZoneDateType extends AbstractTimeZoneDateTimeType
{
    /**
     * {@inheritDoc}
     */
    protected function getFormat(AbstractPlatform $platform)
    {
        return $platform->getDateFormatString();
    }
}
