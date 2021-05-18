<?php

namespace App\Services\Category;

use App\Dto\CategoryDto;
use App\Models\Category;
use Illuminate\Support\Collection;

interface CategoryServiceInterface
{
    /**
     * * Get a list of categories
     * 
     * @return Illuminate\Support\Collection<CategoryDto>
     */
    public function getAll(): Collection;

    /**
     * * Get list of products by category
     * 
     * @param Illuminate\Support\Collection $category
     * @return Illuminate\Support\Collection
     */
    public function getProducts(Category $category): Collection;

    /**
     * * Insert a category
     * 
     * @param array $categoryData
     * @return CategoryDto | Inserted category
     */
    public function add(array $categoryData): CategoryDto;
}
