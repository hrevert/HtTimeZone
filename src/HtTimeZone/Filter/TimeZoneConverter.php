<?php
namespace HtTimeZone\Filter;

use Zend\Filter\FilterInterface;
use DateTime;
use DateTimeZone;

class TimeZoneConverter implements FilterInterface
{
    protected $inputFormat;

    protected $outputFormat;
    
    protected $fromTimeZone;

    protected $toTimeZone;

    public function setInputFormat($inputFormat)
    {
        $this->inputFormat = $inputFormat;
    }

    public function setOutputFormat($outputFormat)
    {
        $this->outputFormat = $outputFormat;
    }

    public function setFromTimeZone($fromTimeZone)
    {
        $this->fromTimeZone = $fromTimeZone;
    }

    public function setToTimeZone($toTimeZone)
    {
        $this->toTimeZone = $toTimeZone;
    }
    
    public function filter($value)
    {
        if ($this->inputFormat) {
            $date = DateTime::createFromFormat($this->inputFormat, $value, $this->fromTimeZone);
        } else {
            $date = new DateTime($value, $this->fromTimeZone);
        }
        $date->setTimezone($this->toTimeZone);
        if ($this->outputFormat) {
            return $date->format($this->outputFormat);
        }
        return $date;
    }            
}
