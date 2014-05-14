<?php
namespace HtTimeZone\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Session\Container;
use Zend\View\Model\JsonModel;
use HtTimeZone\Options\ClientSideTimeZoneDetectionService;

class TimeZoneController extends AbstractActionController
{
    protected $clientSideTimeZoneDetectionService;

    public function __construct(ClientSideTimeZoneDetectionService $clientSideTimeZoneDetectionService)
    {
        $this->clientSideTimeZoneDetectionService = $clientSideTimeZoneDetectionService;
    }

    public function recordAction()
    {
        if (!$this->clientSideTimeZoneDetectionService->isEnabled()) {
            return $this->notFoundAction();
        }

        $timezone = $this->params()->fromRoute('timezone', null);
        if ($timezone === null) {
            return $this->notFoundAction();
        }

        $this->clientSideTimeZoneDetectionService->setClientTimeZone($timezone);

        return new JsonModel(['status' => 'ok']);
    }
}
