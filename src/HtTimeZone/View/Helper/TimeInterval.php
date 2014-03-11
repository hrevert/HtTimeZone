<?php
namespace HtTimeZone\View\Helper;

use Zend\View\Helper\AbstractHelper;
use DateTime;
use HtTimeZone\Exception;

class TimeInterval extends AbstractHelper
{
    public function __invoke($dateTime = null)
    {
        if ($dateTime === null) {
            return $this;
        }

        if ($dateTime instanceof DateTime || is_string($dateTime)) {
            return $this->fromDateTime($dateTime);
        } elseif (is_float($dateTime) || is_int($dateTime)) {
            return $this->fromTimeStamp($dateTime);
        }

        throw new Exception\InvalidArgumentException(
            sprintf('%s expects parameter 1 to be timestamp or an instance of DateTime, %s provided instead'),
            __METHOD__,
            is_object($dateTime) ? get_class($dateTime) : gettype($dateTime)
        );
    }

    public function fromTimeStamp($timestamp)
    {
        $diff = time() - $timestamp;
        if ($diff <= 0) {
            return 'Just Now';
        } elseif ($diff < 60) {
            return $this->grammarDate(floor($diff), ' second(s) ago');
        } elseif ($diff < 60 * 60) {
            return $this->grammarDate(floor($diff / 60), ' minute(s) ago');
        } elseif ($diff < 60 * 60 * 24) {
            return $this->grammarDate(floor($diff / (60 * 60)), ' hour(s) ago');
        } elseif ($diff < 60 * 60 * 24 * 30) {
            return $this->grammarDate(floor($diff / (60 * 60 * 24)), ' day(s) ago');
        } elseif ($diff < 60 * 60 * 24 * 30 * 12) {
            return $this->grammarDate(floor($diff / (60 * 60 * 24 * 30)), ' month(s) ago');
        } else {
            return $this->grammarDate(floor($diff / (60 * 60 * 24 * 30 * 12)), ' year(s) ago');
        }
    }

    public function fromDateTime($dateTime)
    {
        if (!$dateTime instanceof DateTime) {
            $dateTime = new DateTime($dateTime);
        }

        return $this->fromTimeStamp($dateTime->getTimestamp());
    }

    protected function grammarDate($val, $sentence)
    {
        if ($val > 1) {
            return $val.str_replace('(s)', 's', $sentence);
        } else {
            return $val.str_replace('(s)', '', $sentence);
        }
    }
}
