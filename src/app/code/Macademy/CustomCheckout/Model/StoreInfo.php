<?php declare(strict_types=1);

namespace Macademy\CustomCheckout\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;

class StoreInfo
{
    public function __construct(
        protected ScopeConfigInterface $scopeConfig,
    ){}

    public function getStorePhoneNumber()
    {
        $phoneNumber = $this->scopeConfig->getValue('general/store_information/phone');

        return $phoneNumber;
    }
}
