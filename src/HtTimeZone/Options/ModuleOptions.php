<?php
namespace HtTimeZone\Options;

use Zend\Stdlib\AbstractOptions;
use DateTimeZone;

class ModuleOptions extends AbstractOptions
{
    protected $__strictMode__ = false;

    protected $defaultTimeZone; 

    protected $region;

    public function setDefaultTimeZone($defaultTimeZone)
    {
        $this->defaultTimeZone = $defaultTimeZone;
    }

    public function getDefaultTimeZone()
    {
        if (!$this->defaultTimeZone) {
           $this->defaultTimeZone = date_default_timezone_get();
        }
        return $this->defaultTimeZone;
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
}
