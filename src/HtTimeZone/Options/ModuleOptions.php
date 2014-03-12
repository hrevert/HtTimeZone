<?php
namespace HtTimeZone\Options;

use Zend\Stdlib\AbstractOptions;
use DateTimeZone;

class ModuleOptions extends AbstractOptions
{
    protected $__strictMode__ = false;

    protected $defaultClientTimeZone;

    protected $region;

    protected $serverTimeZone = 'UTC';

    public function setDefaultClientTimeZone($defaultClientTimeZone)
    {
        if (is_string($defaultClientTimeZone)) {
            $defaultClientTimeZone = new DateTimeZone($defaultClientTimeZone);
        }
        $this->defaultClientTimeZone = $defaultClientTimeZone;
    }

    public function getDefaultClientTimeZone()
    {
        if (!$this->defaultClientTimeZone) {
           $this->setDefaultClientTimeZone(date_default_timezone_get());
        }

        return $this->defaultClientTimeZone;
    }

    public function setRegion($region)
    {
        $this->region = $region;
    }

    public function getRegion()
    {
        if ($this->region === null) {
            $this->region = DateTimeZone::ALL;
        }

        return $this->region;
    }

    public function setServerTimeZone($serverTimeZone)
    {
        if (is_string($serverTimeZone)) {
            $serverTimeZone = new DateTimeZone($serverTimeZone);
        }
        $this->serverTimeZone = $serverTimeZone;
    }

    public function getServerTimeZone()
    {
        $serverTimeZone = $this->serverTimeZone;
        if (is_string($serverTimeZone)) {
            $this->setServerTimeZone($serverTimeZone);
        }

        return $serverTimeZone;
    }
}
