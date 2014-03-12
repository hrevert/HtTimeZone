<?php

namespace HtTimeZone\View\Helper;

use Zend\View\Helper\AbstractHelper;
use DateTime;
use DateTimeZone;

class TimeZone extends AbstractHelper
{
    protected $clientTimeZone;

    public function __construct($clientTimeZone = null)
    {
        if ($clientTimeZone) {
            $this->setClientTimeZone($clientTimeZone);
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

        $dateTime->setTimeZone($this->getClientTimeZone());

        return $dateTime;
    }

    public function setClientTimeZone(DateTimeZone $clientTimeZone)
    {
        $this->clientTimeZone = $clientTimeZone;
    }

    public function getClientTimeZone()
    {
        return $this->clientTimeZone;
    }
}
