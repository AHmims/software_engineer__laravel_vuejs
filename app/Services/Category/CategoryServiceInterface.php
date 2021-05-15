<?php

namespace App\Services\Category;

use App\Dto\CategoryDto;

interface CategoryServiceInterface
{
    /**
     * * Get a category by its id
     * @param int $id id of category to get
     * @return CategoryDto
     * @return null
     */
    public function get(int $id): ?CategoryDto;
}
