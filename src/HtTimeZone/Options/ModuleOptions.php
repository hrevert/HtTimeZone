<?php
namespace HtTimeZone\Options;

use Zend\Stdlib\AbstractOptions;
use DateTimeZone;

class ModuleOptions extends AbstractOptions
{
    /**
     * @var bool
     */
    protected $__strictMode__ = false;

    /**
     * @var string|DateTimeZone
     */
    protected $defaultClientTimeZone;

    /**
     * @var int
     */
    protected $region

    /**
     * @var string||DateTimeZone
     */
    protected $serverTimeZone = 'UTC';

    /**
     * Sets defaultClientTimeZone
     *
     * @param string|DateTimeZone $defaultClientTimeZone
     * @return void
     */
    public function setDefaultClientTimeZone($defaultClientTimeZone)
    {
        if (is_string($defaultClientTimeZone)) {
            $defaultClientTimeZone = new DateTimeZone($defaultClientTimeZone);
        }
        $this->defaultClientTimeZone = $defaultClientTimeZone;
    }

    /**
     * Gets defaultClientTimeZone
     *
     * @return DateTimeZone
     */
    public function getDefaultClientTimeZone()
    {
        if (!$this->defaultClientTimeZone) {
           $this->setDefaultClientTimeZone(date_default_timezone_get());
        }

        return $this->defaultClientTimeZone;
    }

    /**
     * Sets region
     *
     * @param int $region
     * @return void
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * Gets region
     *
     * @return int 
     */
    public function getRegion()
    {
        if ($this->region === null) {
            $this->region = DateTimeZone::ALL;
        }

        return $this->region;
    }

    /**
     * Sets serverTimeZone
     *
     * @param string|DateTimeZone $serverTimeZone
     * @return void
     */    
    public function setServerTimeZone($serverTimeZone)
    {
        if (is_string($serverTimeZone)) {
            $serverTimeZone = new DateTimeZone($serverTimeZone);
        }
        $this->serverTimeZone = $serverTimeZone;
    }

    /**
     * Gets serverTimeZone
     *
     * @return DateTimeZone
     */
    public function getServerTimeZone()
    {
        $serverTimeZone = $this->serverTimeZone;
        if (is_string($serverTimeZone)) {
            $this->setServerTimeZone($serverTimeZone);
        }

        return $serverTimeZone;
    }
}
