<?php

declare(strict_types=1);

namespace Macademy\Jumpstart\Model;

use Macademy\Jumpstart\Api\CategoryInterface;

class Category implements CategoryInterface
{
    private Category $category;

    public function __construct()
    {
    }

    public function getName(): string
    {
        return "This is Category name!";
    }
}
