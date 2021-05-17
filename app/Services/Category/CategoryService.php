<?php

namespace App\Services\Category;

use App\Dto\CategoryDto;
use App\Dto\ObjectMapper;
use App\Models\Category;
use App\Repository\Category\CategoryRepositoryInterface;
use Illuminate\Support\Collection;

class CategoryService implements CategoryServiceInterface
{
    #region Dependencies injection

    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    #endregion

    /**
     * 
     */
    public function getAll(): Collection
    {
        return ObjectMapper::mapCategoryToCategoryDto($this->categoryRepository->getAll());
    }

    /**
     * 
     */
    public function getProducts(Category $category): Collection
    {
        $category->load('products');
        return ObjectMapper::mapProductToProductDto($category->products);
    }
}
