<?php
namespace HtTimeZone\DBAL\Types;

use Doctrine\DBAL\Types\StringType;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use DateTimeZone;

class TimeZoneType extends StringType
{
     /**
      * @param DateTimeZone|string $value
      * @param DoctrineDBALPlatformsAbstractPlatform $platform
      * @return string
      */
     public function convertToDatabaseValue($value, AbstractPlatform $platform)
     {
         if ($value instanceof DateTimeZone) {
             $value = $value->getName();
         }

         return $value;
     }

    /**
     * @param  string                                $value
     * @param  DoctrineDBALPlatformsAbstractPlatform $platform
     * @return DateTimeZone|string
     * @throws DoctrineDBALTypesConversionException
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if (is_string($value)) {
            $value = new DateTimeZone($value);
        }

        return $value;
    }

}
