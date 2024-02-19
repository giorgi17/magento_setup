<?php declare(strict_types=1);

namespace Devall\Signup\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class DevUser extends AbstractDb
{
    const MAIN_TABLE = 'devall_signup_form';
    const ID_FIELD_NAME = 'id';

    protected function _construct()
    {
        $this->_init(self::MAIN_TABLE, self::ID_FIELD_NAME);
    }
}
