<?php declare(strict_types=1);

namespace Devall\WeatherApp\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class WeatherHistorical extends AbstractDb
{
    const MAIN_TABLE = 'devall_weatherapp_historical_data';
    const ID_FIELD_NAME = 'id';

    protected function _construct()
    {
        $this->_init(self::MAIN_TABLE, self::ID_FIELD_NAME);
    }
}
