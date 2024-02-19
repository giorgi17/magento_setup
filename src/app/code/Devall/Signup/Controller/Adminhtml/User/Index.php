<?php declare(strict_types=1);

namespace Devall\Signup\Controller\Adminhtml\User;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action implements HttpGetActionInterface
{
    const ADMIN_RESOURCE = 'Devall_Signup::users';

    public function __construct(
        Context $context,
        protected PageFactory $pageFactory,
    )
    {
        parent::__construct($context);
    }

    public function execute(): Page
    {
        $page = $this->pageFactory->create();
        $page->setActiveMenu('Devall_Signup::users');
        $page->getConfig()->getTitle()->prepend(__('Devall Users'));

        return $page;
    }
}
