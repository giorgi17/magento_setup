<?php declare(strict_types=1);

namespace Devall\Signup\Model\ResourceModel\DevUser;

use Devall\Signup\Model\DevUser;
use Devall\Signup\Model\ResourceModel\DevUser as DevUserResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(DevUser::class, DevUserResourceModel::class);
    }
}
