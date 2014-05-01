<?php
namespace HtTimeZone\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ConversionException;
use Doctrine\DBAL\Types\DateTimeType;
use DateTime;

abstract class AbstractTimeZoneDateTimeType extends DateTimeType
{
     /**
      * @param DateTime $value
      * @param DoctrineDBALPlatformsAbstractPlatform $platform
      * @return string
      */
     public function convertToDatabaseValue($value, AbstractPlatform $platform)
     {
        if ($value === null) {
            return null;
        }
        $value->setTimezone($this->getDateTimeZone());

        return $value->format($this->getFormat($platform));
    }

    /**
     * @param  string                                $value
     * @param  DoctrineDBALPlatformsAbstractPlatform $platform
     * @return DateTime|mixed|null
     * @throws DoctrineDBALTypesConversionException
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if ($value === null) {
            return null;
        }

        $val = DateTime::createFromFormat(
            $this->getFormat($platform),
            $value,
            $this->getDateTimeZone()
        );
        if (!$val) {
            throw ConversionException::conversionFailed($value, $this->getName());
        }

        return $val;
    }

    /**
     * Gets format of storage
     *
     * @param  AbstractPlatform $platform
     * @return string
     */
    protected function getFormat(AbstractPlatform $platform)
    {
        return $platform->getDateTimeFormatString();
    }

    /**
     * Gets DateTimeZone
     *
     * @return \DateTimeZone
     */
    abstract protected function getDateTimeZone();
}
