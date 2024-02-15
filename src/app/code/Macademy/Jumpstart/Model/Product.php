<?php

declare(strict_types=1);

namespace Macademy\Jumpstart\Model;

use Macademy\Jumpstart\Api\CategoryInterface;

class Product
{
    public function __construct(
        private CategoryInterface $category
    ) {
    }

    public function getCategoryName(): string
    {
        return $this->category->getName();
    }
}
