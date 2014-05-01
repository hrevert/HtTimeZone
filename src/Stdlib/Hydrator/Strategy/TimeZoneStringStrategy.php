<?php
namespace HtTimeZone\Stdlib\Hydrator\Strategy;

use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;
use DateTime;
use DateTimeZone;

/**
 * Converts string to instance of DateTimeZone for injecting to object And Converts instance of DateTimeZone to string
 */
class TimeZoneStringStrategy implements StrategyInterface
{
    /**
     *
     * @param string|DateTimeZone $value
     * @return DateTimeZone
     */
    public function hydrate($value)
    {
        if (is_string($value)) {
            $value = new DateTimeZone($value);
        } elseif (!$value instanceof DateTimeZone) {
            throw new Exception\InvalidArgumentException(
                sprintf(
                    '%s expects parameter 1 to be string or instance of DateTimeZone, %s provided instead',
                    __METHOD__,
                    is_object($value) ? get_class($value) : gettype($value)
                )
            );
        }

        return $value;
    }

    /**
     * Converts instance of DateTimeZone to string
     *
     * @param string|DateTimeZone $value
     * @return string
     */
    public function extract($value)
    {
        if ($value instanceof DateTimeZone) {
            $value = $value->getName();
        } elseif (!is_string($value)) {
            throw new Exception\InvalidArgumentException(
                sprintf(
                    '%s expects parameter 1 to be string or instance of DateTimeZone, %s provided instead',
                    __METHOD__,
                    is_object($value) ? get_class($value) : gettype($value)
                )
            );            
        }

        return $value;
    }
}
