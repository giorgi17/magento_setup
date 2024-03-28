<?php declare(strict_types=1);

namespace Devall\WeatherApp\Api\Data;

/**
 * Weather Historical interface
 * @api
 * @since 1.0.0
 */
interface WeatherHistoricalInterface
{
    const ID = 'id';
    const CITY = 'city';
    const COUNTRY = 'country';
    const DESCRIPTION = 'description';
    const TEMPERATURE = 'temperature';
    const FEELS_LIKE = 'feelsLike';
    const PRESSURE = 'pressure';
    const HUMIDITY = 'humidity';
    const WINDSPEED = 'windspeed';
    const SUNRISE = 'sunrise';
    const SUNSET = 'sunset';
    const CREATED_AT = 'created_at';

    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $value
     * @return $this
     */
    public function setId($value);

    /**
     * @return string
     */
    public function getCity();

    /**
     * @param string $city
     * @return $this
     */
    public function setCity($city);

    /**
     * @return string
     */
    public function getCountry();

    /**
     * @param string $country
     * @return $this
     */
    public function setCountry($country);

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description);

    /**
     * @return int
     */
    public function getTemperature();

    /**
     * @param int $temperature
     * @return $this
     */
    public function setTemperature($temperature);

    /**
     * @return int
     */
    public function getFeelsLike();

    /**
     * @param int $feelsLike
     * @return $this
     */
    public function setFeelsLike($feelsLike);

    /**
     * @return int
     */
    public function getPressure();

    /**
     * @param int $pressure
     * @return $this
     */
    public function setPressure($pressure);

    /**
     * @return int
     */
    public function getHumidity();

    /**
     * @param int $humidity
     * @return $this
     */
    public function setHumidity($humidity);

    /**
     * @return int
     */
    public function getWindspeed();

    /**
     * @param int $windspeed
     * @return $this
     */
    public function setWindspeed($windspeed);

    /**
     * @return string
     */
    public function getSunrise();

    /**
     * @param string $sunrise
     * @return $this
     */
    public function setSunrise($sunrise);

    /**
     * @return string
     */
    public function getSunset();

    /**
     * @param string $sunset
     * @return $this
     */
    public function setSunset($sunset);
}
