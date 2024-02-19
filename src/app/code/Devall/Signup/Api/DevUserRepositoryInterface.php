<?php declare(strict_types=1);

namespace Devall\Signup\Api;

use Devall\Signup\Api\Data\DevUserInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Dev user CRUD interface.
 * @api
 * @since 1.0.0
 */
interface DevUserRepositoryInterface
{
    /**
     * @param int $id
     * @return DevUserInterface
     * @throws LocalizedException
     */
    public function getById(int $id): DevUserInterface;

    /**
     * @param DevUserInterface $devUser
     * @return DevUserInterface
     * @throws LocalizedException
     */
    public function save(DevUserInterface $devUser): DevUserInterface;

    /**
     * @param int $id
     * @param DevUserInterface $devUser
     * @return DevUserInterface
     * @throws NoSuchEntityException
     */
    public function update(int $id, DevUserInterface $devUser): DevUserInterface;

    /**
     * @param int $id
     * @return bool
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    public function deleteById(int $id): bool;
}
