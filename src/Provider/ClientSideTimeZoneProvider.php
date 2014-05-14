<?php
namespace HtTimeZone\Provider;

use HtTimeZone\Service\ClientSideTimeZoneDetectionService;

class ClientSideTimeZoneProvider implements TimeZoneProviderInterface
{

    protected $clientSideTimeZoneDetectionService;

    public function __construct(ClientSideTimeZoneDetectionService $clientSideTimeZoneDetectionService)
    {
        $this->clientSideTimeZoneDetectionService = $clientSideTimeZoneDetectionService;
    }

    /**
     * {@inheritDoc}
     */
    public function getTimeZone()
    {
        return $this->clientSideTimeZoneDetectionService->getClientTimeZone();
    }    
}
