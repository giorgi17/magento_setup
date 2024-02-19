<?php declare(strict_types=1);

namespace Devall\Signup\Model;

use Devall\Signup\Api\Data\DevUserInterface;
use Magento\Framework\Model\AbstractModel;

class DevUser extends AbstractModel implements DevUserInterface
{
    protected function _construct()
    {
        $this->_init(ResourceModel\DevUser::class);
    }

    public function getName()
    {
        return $this->getData(self::NAME);
    }

    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    public function getDate()
    {
        return $this->getData(self::DATE);
    }

    public function setDate($date)
    {
        return $this->setData(self::DATE, $date);
    }

    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }
}
