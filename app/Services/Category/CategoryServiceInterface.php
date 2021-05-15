<?php

namespace App\Services\Category;

use App\Dto\CategoryDto;

interface CategoryServiceInterface
{
    /**
     * * Get a category by its id
     * 
     * @param int $categoryId id of category to get
     * @return CategoryDto
     * @return null
     */
    public function get(int $categoryId): ?CategoryDto;

    /**
     * * Get a list of categories
     * 
     * @return array<CategoryDto> | List of all categories
     */
    public function getAll(): array;
}
