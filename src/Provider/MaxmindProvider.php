<?php
namespace HtTimeZone\Provider;

use ZfSnapGeoip\Entity\RecordInterface;

class MaxmindProvider implements TimeZoneProviderInterface
{
    /**
     * @var RecordInterface
     */
    protected $record;

    /**
     * @param RecordInterface $record
     */
    public function __construct(RecordInterface $record)
    {
        $this->record = $record;
    }

    /**
     * {@inheritDoc}
     */
    public function getTimeZone()
    {
        if (!function_exists('get_time_zone')) {
            $paths = [__DIR__ . '/../../vendor', __DIR__ . '/../vendor'];
            foreach ($paths as $path) {
                $file = $path . '/geoip/geoip/src/timezone.php';
                if (is_readable($file)) {
                    require_once $file;
                    break;
                }
                
            }            
        }

        return get_time_zone($this->record->getCountryCode(), $this->record->getRegion());
    }    
}

