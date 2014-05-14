<?php
namespace HtTimeZone\Service;

use Zend\Session\Container;
use HtTimeZone\Options\ModuleOptions;

class ClientSideTimeZoneDetectionService
{
    protected $sessionContainer;

    protected $storageNamespace = 'HtTimeZone';

    protected $options;

    public function __construct((ModuleOptions $options)
    {
        $this->options = $options;
        $this->sessionContainer = new Container($this->storageNamespace);
    }

    public function getClientTimeZone()
    {
        if (isset($this->sessionContainer->clientTimeZone)) {
            return $this->sessionContainer->clientTimeZone;
        }

        return null;
    }

    public function setClientTimeZone($clientTimeZone)
    {
        $this->sessionContainer->clientTimeZone = $clientTimeZone;;      
    }

    public function isEnabled()
    {
        return $this->options->getEnableClientSideTimeZoneDetection();
    }
}
