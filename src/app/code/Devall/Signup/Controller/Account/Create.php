<?php declare(strict_types=1);

namespace Devall\Signup\Controller\Account;

use Devall\Signup\Api\DevUserRepositoryInterface;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Devall\Signup\Model\DevUserFactory;

class Create implements HttpPostActionInterface
{
    public function __construct(
        private RequestInterface $request,
        protected JsonFactory $resultJsonFactory,
        private DevUserRepositoryInterface $devUserRepository,
        private DevUserFactory $devUserFactory,
    )
    {
    }

    public function execute()
    {
        $result = $this->resultJsonFactory->create();

        $name = $this->request->getPost('name');
        $date = $this->request->getPost('date');

        try {
            $newDevUser = $this->devUserFactory->create();
            $newDevUser->setData([
                'name' => $name,
                'date' => $date,
            ]);
            $this->devUserRepository->save($newDevUser);
            return $result->setData(['success' => true]);
        } catch (\Exception $exception) {
            return $result->setData(['error' => $exception->getMessage()]);
        }
    }
}
