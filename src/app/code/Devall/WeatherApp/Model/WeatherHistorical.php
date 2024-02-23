<?php declare(strict_types=1);

namespace Devall\WeatherApp\Model;

use Devall\WeatherApp\Api\Data\WeatherHistoricalInterface;
use Magento\Framework\Model\AbstractModel;

class WeatherHistorical extends AbstractModel implements WeatherHistoricalInterface
{
    protected function _construct()
    {
        $this->_init(ResourceModel\WeatherHistorical::class);
    }

    public function getCity()
    {
        return $this->getData(self::CITY);
    }

    public function setCity($city)
    {
        return $this->setData(self::CITY, $city);
    }

    public function getCountry()
    {
        return $this->getData(self::COUNTRY);
    }

    public function setCountry($country)
    {
        return $this->setData(self::COUNTRY, $country);
    }

    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

    public function setDescription($description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

    public function getTemperature()
    {
        return $this->getData(self::TEMPERATURE);
    }

    public function setTemperature($temperature)
    {
        return $this->setData(self::TEMPERATURE, $temperature);
    }

    public function getFeelsLike()
    {
        return $this->getData(self::FEELS_LIKE);
    }

    public function setFeelsLike($feelsLike)
    {
        return $this->setData(self::FEELS_LIKE, $feelsLike);
    }

    public function getPressure()
    {
        return $this->getData(self::PRESSURE);
    }

    public function setPressure($pressure)
    {
        return $this->setData(self::PRESSURE, $pressure);
    }

    public function getHumidity()
    {
        return $this->getData(self::HUMIDITY);
    }

    public function setHumidity($humidity)
    {
        return $this->setData(self::HUMIDITY, $humidity);
    }

    public function getWindspeed()
    {
        return $this->getData(self::WINDSPEED);
    }

    public function setWindspeed($windspeed)
    {
        return $this->setData(self::WINDSPEED, $windspeed);
    }

    public function getSunrise()
    {
        return $this->getData(self::SUNRISE);
    }

    public function setSunrise($sunrise)
    {
        return $this->setData(self::SUNRISE, $sunrise);
    }

    public function getSunset()
    {
        return $this->getData(self::SUNSET);
    }

    public function setSunset($sunset)
    {
        return $this->setData(self::SUNSET, $sunset);
    }
}
