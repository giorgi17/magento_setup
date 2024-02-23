<?php declare(strict_types=1);

namespace Devall\WeatherApp\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\View\Result\Page;

class Index implements HttpGetActionInterface
{
    public function __construct(
        private PageFactory $pageFactory,
    )
    {
    }

    public function execute(): Page
    {
        return $this->pageFactory->create();
    }
}
