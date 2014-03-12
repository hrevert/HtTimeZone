<?php
namespace HtTimeZone\Filter;

use Zend\Filter\FilterInterface;
use DateTime;
use DateTimeZone;

class ClientToServerTimeZone implements  FilterInterface
{
    protected $serverTimeZone;

    protected $clientTimeZone;

    protected $inputFormat;

    protected $outputFormat;

    public function __construct(DateTimeZone $clientTimeZone, DateTimeZone $serverTimeZone)
    {
        $this->clientTimeZone = $clientTimeZone;
        $this->serverTimeZone = $serverTimeZone;
    }

    public function setInputFormat($inputFormat)
    {
        $this->inputFormat = $inputFormat;
    }

    public function setOutputFormat($outputFormat)
    {
        $this->outputFormat = $outputFormat;
    }

    public function filter($value)
    {
        if ($this->inputFormat) {
            $date = DateTime::createFromFormat($this->inputFormat, $value, $this->clientTimeZone);
        } else {
            $date = new \DateTime($value, $this->clientTimeZone);
        }
        $date->setTimezone($this->serverTimeZone);
        if ($this->outputFormat) {
            return $date->format($this->outputFormat);
        }
        return $date;
    }
}
