<?php
namespace HtTimeZone\Filter;

use Zend\Filter\AbstractFilter;
use DateTime;
use DateTimeZone;

class TimeZoneConverter extends AbstractFilter
{
    /**
     * @var string|null
     */
    protected $inputFormat;

    /**
     * @var string|null
     */
    protected $outputFormat;

    /**
     * @var DateTimeZone
     */
    protected $fromTimeZone;

    /**
     * @var DateTimeZone
     */
    protected $toTimeZone;

    /**
     * Constructor
     *
     * @param DateTimeZone|null $fromTimeZone
     * @param DateTimeZone|null $toTimeZone
     */
    public function __construct(DateTimeZone $fromTimeZone = null, DateTimeZone $toTimeZone = null)
    {
        if ($fromTimeZone) {
            $this->fromTimeZone = $fromTimeZone;
        }
        if ($toTimeZone) {
            $this->toTimeZone = $toTimeZone;
        }
    }

    /**
     * Sets input format
     *
     * @param  string $inputFormat
     * @return void
     */
    public function setInputFormat($inputFormat)
    {
        $this->inputFormat = $inputFormat;
    }

    /**
     * Gets input format
     *
     * @return string|null
     */
    public function getInputFormat()
    {
        return $this->inputFormat;
    }

    /**
     * Sets output format
     *
     * @param  string $outputFormat
     * @return void
     */
    public function setOutputFormat($outputFormat)
    {
        $this->outputFormat = $outputFormat;
    }

    /**
     * Gets output format
     *
     * @return string|null
     */
    public function getOutputFormat()
    {
        return $this->outputFormat;
    }

    /**
     * Sets from timezone
     *
     * @param  DateTimeZone $fromTimeZone
     * @return void
     */
    public function setFromTimeZone(DateTimeZone $fromTimeZone)
    {
        $this->fromTimeZone = $fromTimeZone;
    }

    /**
     * Gets from timezone
     *
     * @return DateTimeZone
     */
    public function getFromTimeZone()
    {
        return $this->fromTimeZone;
    }

    /**
     * Sets to timezone
     *
     * @param  DateTimeZone $toTimeZone
     * @return void
     */
    public function setToTimeZone(DateTimeZone $toTimeZone)
    {
        $this->toTimeZone = $toTimeZone;
    }

    /**
     * Gets to timezone
     *
     * @return DateTimeZone
     */
    public function getToTimeZone()
    {
        return $this->toTimeZone;
    }

    /**
     * Converts datetime from timezone to other
     *
     * @param  string|DateTime $value
     * @return string|DateTime
     */
    public function filter($value)
    {
        if ($value instanceof DateTime) {
            $date = $value;
        } elseif ($this->getInputFormat()) {
            $date = DateTime::createFromFormat($this->getInputFormat(), $value, $this->getFromTimeZone());
        } else {
            $date = new DateTime($value, $this->getFromTimeZone());
        }
        $date->setTimezone($this->getToTimeZone());
        if ($this->getOutputFormat()) {
            return $date->format($this->getOutputFormat());
        }

        return $date;
    }
}
