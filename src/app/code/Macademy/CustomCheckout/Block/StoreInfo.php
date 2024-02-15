<?php declare(strict_types=1);

namespace Macademy\CustomCheckout\Block;

use Magento\Framework\View\Element\Template;
use Macademy\CustomCheckout\Model\StoreInfo as StoreInfoModel;

class StoreInfo extends Template
{
    public function __construct(
        Template\Context $context,
        protected StoreInfoModel $storeInfoModel,
        array $data = [],
    )
    {
        parent::__construct($context, $data);

        return $this->storeInfoModel->getStorePhoneNumber();
    }

    public function getStorePhoneNumber()
    {
        return $this->storeInfoModel->getStorePhoneNumber();
    }
}
