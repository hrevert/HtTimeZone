<?php

namespace HtTimeZone\Provider;

use Zend\Authentication\AuthenticationService;

class ZfcUserTimeZoneProvider implements TimeZoneProviderInterface
{
    /**
     * @var AuthenticationService
     */
    protected $authenticationService;

    /**
     * Constructor
     *
     * @param AuthenticationService $authenticationService
     */
    public function __construct(AuthenticationService $authenticationService)
    {
        $this->authenticationService = $authenticationService;
    }

    /**
     * Gets authenticationService
     *
     * @return AuthenticationService
     */
    public function getAuthenticationService()
    {
        return $this->authenticationService;
    }

    /**
     * {@inheritDoc}
     */
    public function getTimeZone()
    {
        if (
            $this->getAuthenticationService()->hasIdentity() &&
            $this->getAuthenticationService()->getIdentity()->getTimeZone()
        ) {
            return $this->getAuthenticationService()->getIdentity()->getTimeZone();
        }

        return null;
    }
}
