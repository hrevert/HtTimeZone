<?php

namespace HtTimeZone\Form\Element;

class TimeZone extends Select
{
    public function __construct()
    {
        $this->setName('time_zone');
        $this->setLabel('Timezone');
    }

    public function setTimeZones(array $timeZones)
    {
        return $this->setValueOptions($timeZones);
    }
}
