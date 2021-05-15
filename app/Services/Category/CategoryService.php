<?php

namespace App\Services\Category;

use App\Dto\CategoryDto;
use App\Models\Category;
use App\Repository\Category\CategoryRepositoryInterface;

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
    public function get(int $categoryId): ?CategoryDto
    {
        if ($categoryId == -1)
            return null;
        //
        $category = $this->categoryRepository->get($categoryId);
        if ($category == null)
            return null;
        //
        $catId = $category->id;
        $catName = $category->name;
        $parentId = $category->parent_category == null ? -1 : $category->parent_category;
        $catParent = $this->get($parentId);
        //
        return new CategoryDto($catName, $catParent, $catId);
    }
}
