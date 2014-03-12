<?php
namespace HtTimeZone\Entity;

class User extends \ZfcUser\Entity\User
{
    /**
     * @var string
     */
    protected $timeZone;

    /**
     * Sets timeZone
     *
     * @param string $timezone
     * @return self
     */
    public function setTimeZone($timeZone)
    {
        $this->timeZone = $timeZone;

        return $this;
    }

    /**
     * Gets timeZone
     *
     * @return string
     */
    public function getTimeZone()
    {
        return $this->timeZone;
    }
}
