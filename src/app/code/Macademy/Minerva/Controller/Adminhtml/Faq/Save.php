<?php declare(strict_types=1);

namespace Macademy\Minerva\Controller\Adminhtml\Faq;

use Macademy\Minerva\Model\Faq;
use Macademy\Minerva\Model\FaqFactory;
use Macademy\Minerva\Model\ResourceModel\Faq as FaqResource;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Exception\NotFoundException;

class Save extends Action implements HttpPostActionInterface
{
    const ADMIN_RESOURCE = 'Macademy_Minerva::faq_save';

    /**
     * @param Context $context
     * @param FaqFactory $faqFactory
     * @param FaqResource $faqResource
     */
    public function __construct(
        Context $context,
        private FaqFactory $faqFactory,
        private FaqResource $faqResource,
    ) {
        parent::__construct($context);
    }

    public function execute(): Redirect
    {
        $post = $this->getRequest()->getPost();
        $isExistingPost = $post->id;
        /** @var Faq $faq */
        $faq = $this->faqFactory->create();
        $redirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);

        if ($isExistingPost) {
            try {
                $this->faqResource->load($faq, $post->id);
                if (!$faq->getData('id')) {
                    throw new NotFoundException(__('This record no longer exists.'));
                }
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                return $redirect->setPath('*/*/');
            }
        } else {
            unset($post->id);
        }

        $faq->setData(array_merge($faq->getData(), $post->toArray()));

        try {
            $this->faqResource->save($faq);
            $this->messageManager->addSuccessMessage(__('The record has been saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('There was a problem saving the record.'));
            return $redirect->setPath('*/*/');
        }

        return $redirect->setPath('*/*');
    }
}
