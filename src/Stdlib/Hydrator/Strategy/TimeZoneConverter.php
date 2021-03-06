<?php
namespace HtTimeZone\Stdlib\Hydrator\Strategy;

use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;
use DateTime;
use DateTimeZone;

/**
 * Converts date of timezone to another
 */
class TimeZoneConverter implements StrategyInterface
{
    /**
     * @var DateTimeZone    Target Timezone for hydrating to object
     */
    protected $hydrateTimeZone;

    /**
     * @var DateTimeZone    Target Timezone for extract from object
     */
    protected $extractTimeZone;

    public function __construct(DateTimeZone $extractTimeZone = null , DateTimeZone $hydrateTimeZone = null)
    {
        if ($extractTimeZone) {
            $this->setExtractTimeZone($extractTimeZone);
        }
        if ($hydrateTimeZone) {
            $this->setHydrateTimeZone($hydrateTimeZone);
        }
    }

    public function setHydrateTimeZone(DateTimeZone $hydrateTimeZone)
    {
        $this->hydrateTimeZone = $hydrateTimeZone;

        return $this;
    }

    public function getHydrateTimeZone()
    {
        return $this->hydrateTimeZone;
    }

    public function setExtractTimeZone(DateTimeZone $extractTimeZone)
    {
        $this->extractTimeZone = $extractTimeZone;

        return $this;
    }

    public function getExtractTimeZone()
    {
        return $this->extractTimeZone;
    }

    /**
     * {@inheritDoc}
     */
    public function hydrate($value)
    {
        if ($value instanceof DateTime && $this->getHydrateTimeZone() instanceof DateTimeZone) {
            return $value->setTimezone($this->getHydrateTimeZone());
        }

        return $value;        
    }

    /**
     * {@inheritDoc}
     */
    public function extract($value)
    {
        if ($value instanceof DateTime && $this->getExtractTimeZone() instanceof DateTimeZone) {
            return $value->setTimezone($this->getExtractTimeZone());
        }

        return $value;
    }
}
