<?php declare(strict_types=1);

namespace Devall\WeatherApp\Model\ResourceModel\WeatherHistorical;

use Devall\WeatherApp\Model\WeatherHistorical;
use Devall\WeatherApp\Model\ResourceModel\WeatherHistorical as WeatherHistoricalResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(WeatherHistorical::class, WeatherHistoricalResourceModel::class);
    }
}
