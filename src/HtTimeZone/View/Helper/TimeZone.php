<?php

namespace HtTimeZone\View\Helper;

use Zend\View\Helper\AbstractHelper;
use DateTime;

class TimeZone extends AbstractHelper
{
    protected $timeZone;

    protected $dateTimeZone;

    public function __construct($timeZone = null)
    {
        if ($timeZone) {
            $this->setTimeZone($timeZone);
        }
    }

    public function __invoke($dateTime)
    {
        if (is_int($dateTime)) {
            $dateTime = new DateTime();
            $dateTime->setTimestamp($dateTime);
        } elseif (is_string($dateTime)) {
            $dateTime = new DateTime($dateTime);
        } elseif (!$dateTime instanceof DateTime) {
            throw new Exception\InvalidArgumentException(
                sprintf(
                    '%s expects parameter 1 to be an instance of \DateTime, %s provided instead',
                    __METHOD__,
                    is_object($dateTime) ? get_class($dateTime) : gettype($dateTime)
                )
            );
        }

        $dateTime->setTimeZone($this->getDateTimeZone());

        return $dateTime;
    }

    public function setTimeZone($timeZone)
    {
        $this->timeZone = $timeZone;
    }

    public function getTimeZone()
    {
        return $this->timeZone;
    }

    public function getDateTimeZone()
    {
        if (!$this->dateTimeZone) {
            $this->dateTimeZone = new \DateTimeZone($this->getTimeZone());
        }

        return $this->dateTimeZone;
    }
}
