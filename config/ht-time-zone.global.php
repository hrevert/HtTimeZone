<?php
/**
 * HtTimeZone Configuration
 *
 * If you have a ./config/autoload/ directory set up for your project, you can
 * drop this config file in it and change the values as you wish.
 */

$moduleOptions = array(

    /**
     * Timezone Provider
     *
     * Please specify the service manager alias for the configured timezone provider that this module should use.
     * This must implement HtTimeZone\Provider\TimeZoneProviderInterface
     *
     * Default is HtTimeZone\ZfcUserTimeZoneProvider 
     * (compatible with ZfcUser, assumes the user entity has method, `getTimeZone`)
     *
     * To use the default visit this link: https://github.com/hrevert/HtTimeZone/blob/master/src/HtTimeZone/Provider/ZfcUserTimeZoneProvider.php
     */
    'client_time_zone_provider' => 'HtTimeZone\Provider\ZfcUserTimeZoneProvider',

    /**
     * Default Timezone
     *
     * Select Timezone to be used when the client timezone provider returns null or false
     * Optional. If not provided, it will be retrieved from php function, `date_default_timezone_get`
     */
    //'default_client_time_zone' => '',

    /**
     * Server Time Zone
     *
     * Default: UTC
     */
    // 'server_time_zone' => 'UTC',
    /**
     * Timezone Region
     *
     * Select timezone region
     * Optional.
     * If you dont provide this, all regions will be used.
     *
     */
     //'region' => DateTimeZone::EUROPE,

);

/**
 * You do not need to edit below this line
 */

return array(
    'ht_time_zone' => $moduleOptions,
    'service_manager' => array(
        'aliases' => array(
            'HtTimeZone\ClientTimeZoneProvider' => $moduleOptions['client_time_zone_provider'],
        )
    )
);
