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

    /**
     * 
     */
    public function getAll(): array
    {
        $categoriesArray = array();
        //
        $categoriesCollection = $this->categoryRepository->getAll();
        if ($categoriesCollection->isNotEmpty()) {
            $tempArray = $categoriesCollection->values()->all();
            for ($i = 0; $i < sizeof($tempArray); $i++) {
                $obj = $tempArray[$i];
                //
                $objId = $obj->id;
                $objName = $obj->name;
                $objParent = $this->get($obj->parent_category != null ? $obj->parent_category : -1);
                //
                $category = new CategoryDto($objName, $objParent, $objId);
                array_push($categoriesArray, $category);
            }
        } //else return an empty array
        return $categoriesArray;
    }
}
