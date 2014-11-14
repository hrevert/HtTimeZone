<?php
namespace HtTimeZoneTest\Provider;

use HtTimeZone\Provider\MaxmindProvider;
use ZfSnapGeoip\Entity\Record;

class MaxmindProviderTest extends \PHPUnit_Framework_TestCase
{
    public function getData()
    {
        return [
            ['NP', null, 'Asia/Kathmandu'],
            ['AR', "02", "America/Argentina/Catamarca"]
        ];
    }

    /**
     * @dataProvider getData
     */
    public function testGetTimeZone($country, $region, $expected)
    {
        $record = new Record();
        $record->setCountryCode($country);
        $record->setRegion($region);
        $provider = new MaxmindProvider($record);
        $this->assertEquals($expected, $provider->getTimeZone());
    }
}
