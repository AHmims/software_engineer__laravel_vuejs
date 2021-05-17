<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repository\Category\CategoryRepositoryInterface;
use App\Services\Category\CategoryServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CategoryController extends Controller
{
    #region Dependencies injection

    private $categoryService;

    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    #endregion

    /**
     * * Returns a list of all Categories
     * 
     * @return Illuminate\Support\Collection<CategoryDto>
     */
    public function getAll(): Collection
    {
        return $this->categoryService->getAll();
    }

    /**
     * * Returns a list of Products by category
     * 
     * @return Illuminate\Support\Collection<ProductDto>
     */
    public function getProductsByCategory(Category $category): Collection
    {
        return $this->categoryService->getProducts($category);
    }
}
