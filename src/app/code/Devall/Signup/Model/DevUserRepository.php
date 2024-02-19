<?php declare(strict_types=1);

namespace Devall\Signup\Model;

use Devall\Signup\Api\Data\DevUserInterface;
use Devall\Signup\Api\DevUserRepositoryInterface;
use Devall\Signup\Model\ResourceModel\DevUser as DevUserResourceModel;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class DevUserRepository implements DevUserRepositoryInterface
{
    public function __construct(
        private DevUserFactory $devUserFactory,
        private DevUserResourceModel $devUserResourceModel,
    ) {
    }

    public function getById(int $id): DevUserInterface
    {
        $devUser = $this->devUserFactory->create();
        $this->devUserResourceModel->load($devUser, $id);

        if (!$devUser->getId()) {
            throw new NoSuchEntityException(__('The DevAll user with "%1" ID doesn\'t exist.', $id));
        }

        return $devUser;
    }

    public function save(DevUserInterface $devUser): DevUserInterface
    {
        try {
            $this->devUserResourceModel->save($devUser);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }

        return $devUser;
    }

    public function update(int $id, DevUserInterface $devUser): DevUserInterface
    {
        if (!$id) {
            throw new NoSuchEntityException(__('Invalid DevAll user ID.'));
        }

        try {
            $existingDevUser = $this->getById($id);
            if (!$existingDevUser->getId()) {
                throw new NoSuchEntityException(__('DevAll User with ID %1 does not exist.', $id));
            }

            $existingDevUser->setData($devUser->getData());
            $this->devUserResourceModel->save($existingDevUser);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }

        return $existingDevUser;
    }

    public function deleteById(int $id): bool
    {
        $devUser = $this->getById($id);

        try {
            $this->devUserResourceModel->delete($devUser);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }

        return true;
    }
}
