<?php declare(strict_types=1);

namespace Macademy\CustomCheckout\Controller\Account;


use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\App\RequestInterface;
use Magento\Customer\Api\CustomerRepositoryInterface;

class UpdateEmail implements HttpPostActionInterface
{
    public function __construct(
        protected JsonFactory $resultJsonFactory,
        private RequestInterface $request,
        private CustomerRepositoryInterface $customerRepository,
    )
    {
    }

    public function execute()
    {
        $result = $this->resultJsonFactory->create();

        $newEmail = $this->request->getPost('email');
        $loggedInCustomerId = $this->request->getPost('customerId');

        if (!$loggedInCustomerId) {
            return $result->setData(['error' => 'User not logged in.']);
        }

        if (!$newEmail) {
            return $result->setData(['error' => 'Email not sent.']);
        }

        try {
            $customer = $this->customerRepository->getById($loggedInCustomerId);
            $customer->setEmail($newEmail);
            $this->customerRepository->save($customer);
            return $result->setData(['success' => true]);
        } catch (\Exception $exception ) {
            return $result->setData(['error' => $exception->getMessage()]);
        }
    }
}
