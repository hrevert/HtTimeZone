<?php

namespace HtTimeZone\Provider;

use Zend\Authentication\AuthenticationService;

class ZfcUserTimeZoneProvider implements TimeZoneProviderInterface
{
    protected $authenticationService;

    public function __construct(AuthenticationService $authenticationService)
    {
        $this->authenticationService = $authenticationService;
    }

    public function getAuthenticationService()
    {
        return $this->authenticationService;
    }

    public function getTimeZone()
    {
        if (
            $this->getAuthenticationService()->hasIdentity() &&
            $this->getAuthenticationService()->getIdentity()->getTimezone()
        ) {
            return $this->getAuthenticationService()->getIdentity()->getTimeZone();
        }

        return null;
    }
}
