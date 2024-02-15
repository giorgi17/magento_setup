<?php

declare(strict_types=1);

namespace Macademy\Blog\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
//use Magento\Framework\Controller\Result\Redirect;
//use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Controller\Result\Forward;
use Magento\Framework\Controller\Result\ForwardFactory;

class Index implements HttpGetActionInterface
{
    public function __construct(
        //        private RedirectFactory $redirectFactory
        private ForwardFactory $forwardFactory
    ) {
    }

    public function execute(): Forward
    {
//        $redirect = $this->redirectFactory->create();
//        return $redirect->setPath('*/post/list')

        /** @var Forward $forward */
        $forward = $this->forwardFactory->create();
        return $forward->setController('post')->forward('list');
    }
}
