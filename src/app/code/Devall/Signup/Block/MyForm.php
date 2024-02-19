<?php declare(strict_types=1);

namespace Devall\Signup\Block;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Template;

class MyForm extends Template
{
    public function __construct(
        Template\Context $context,
        protected ScopeConfigInterface $scopeConfig,
        array $data = [],
    )
    {
        parent::__construct($context, $data);
    }

    public function isFormEnabled()
    {
        $formToggle = $this->scopeConfig->getValue('users/general/enabled');

        return $formToggle;
    }
}
