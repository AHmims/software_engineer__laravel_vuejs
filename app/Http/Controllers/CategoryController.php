<?php

namespace App\Http\Controllers;

use App\Repository\Category\CategoryRepositoryInterface;
use App\Services\Category\CategoryServiceInterface;
use Illuminate\Http\Request;

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
     * @param Request $request
     * @return array<CategoryDto>
     */
    public function getAll(): array
    {
        return $this->categoryService->getAll();
    }
}
