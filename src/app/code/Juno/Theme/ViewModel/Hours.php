<?php declare(strict_types=1);

namespace Juno\Theme\ViewModel;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class Hours implements ArgumentInterface
{
    public function __construct(
        private readonly ScopeConfigInterface $scopeConfig,
    ) {}

    public function getHours(): string
    {
        return $this->scopeConfig->getValue('general/store_information/hours');
    }


}
