<?php
namespace HtTimeZone\Entity;

class User extends \ZfcUser\Entity\User
{
    protected $timeZone;

    public function setTimeZone($timeZone)
    {
        $this->timeZone = $timeZone; 
        return $this;
    }

    public function getTimeZone()
    {
        return $this->timeZone;
    }
}
