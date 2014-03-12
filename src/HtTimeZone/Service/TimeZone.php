<?php

namespace HtTimeZone\Service;

use DateTimeZone;
use DateTime;

class TimeZone
{
    protected $moduleOptions;

    protected $clientTimeZoneProvider;

    protected $timezoneOptions;

    use \Zend\ServiceManager\ServiceLocatorAwareTrait;

    public function getModuleOptions()
    {
        if (!$this->moduleOptions) {
            $this->moduleOptions = $this->getServiceLocator()->get('HtTimeZone\ModuleOptions');
        }

        return $this->moduleOptions;
    }

    public function getClientTimeZoneProvider()
    {
        if (!$this->clientTimeZoneProvider) {
            $this->clientTimeZoneProvider = $this->getServiceLocator()->get('HtTimeZone\ClientTimeZoneProvider');
        }

        return $this->clientTimeZoneProvider;
    }

    public function getTimeZoneOptions()
    {
        if (!$this->timezoneOptions) {
            $this->timezoneOptions = array();
            $timezones = DateTimeZone::listIdentifiers($this->getModuleOptions()->getRegion());
            $timezoneOffsets = array();
            foreach ($timezones as $timezone) {
                $tz = new DateTimeZone($timezone);
                $timezoneOffsets[$timezone] = $tz->getOffset(new DateTime);
            }

            // sort timezone by offset
            asort($timezoneOffsets);

            $timezoneOptions = array();
            foreach ($timezoneOffsets as $timezone => $offset) {
                $offsetPrefix = $offset < 0 ? '-' : '+';
                $offsetFormatted = gmdate( 'H:i', abs($offset) );

                $prettyOffset = 'UTC' . $offsetPrefix . $offsetFormatted;

                $timezoneOptions[$timezone] = "($prettyOffset) $timezone";
            }

            $this->timezoneOptions = $timezoneOptions;
        }

        return $this->timezoneOptions;
    }

    public function getClientTimeZone()
    {
        if ($this->getClientTimeZoneProvider()->getTimeZone()) {
            return $this->getClientTimeZoneProvider()->getTimeZone();
        }

        return $this->getModuleOptions()->getDefaultClientTimeZone();
    }
}
