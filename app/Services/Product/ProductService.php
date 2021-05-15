<?php

namespace App\Services\Product;

use App\Dto\CategoryDto;
use App\Dto\ProductDto;
use App\Repository\Product\ProductRepositoryInterface;
use App\Services\Category\CategoryServiceInterface;
use Exception;

class ProductService implements ProductServiceInterface
{
    #region Dependencies injection

    private $productRepository, $categoryService;

    public function __construct(ProductRepositoryInterface $productRepository, CategoryServiceInterface $categoryService)
    {
        $this->productRepository = $productRepository;
        $this->categoryService = $categoryService;
    }

    #endregion


    /**
     * TODO create custom exception handler
     */
    public function getAll(string $sortKey, string $sortValue): array
    {
        $sortingKeys = array('price', 'name');
        $sortingMethods = array('asc', 'desc');
        //
        if (!in_array($sortKey, $sortingKeys))
            throw new Exception("Error Processing Request", 1);
        if (!in_array($sortValue, $sortingMethods))
            throw new Exception("Error Processing Request", 1);
        //
        //
        $productsArray = array();
        //
        $productsCollection = $this->productRepository->getAll();
        if ($productsCollection->isNotEmpty()) {
            // Sort collection
            if ($sortValue == 'asc')
                $productsCollection->sortBy($sortKey);
            else
                $productsCollection->sortByDesc($sortKey);
            //
            // Map raw data to ProductDto
            $tempArray = $productsCollection->values()->all();
            error_log(json_encode($tempArray));
            for ($i = 0; $i < sizeof($tempArray); $i++) {
                $obj = $tempArray[$i];
                //
                $objName = $obj->name;
                $objDescription = $obj->description;
                $objPrice = $obj->price;
                $objImage = $obj->image;
                $objCategories = array();
                foreach ($obj->categories as $category) {
                    $parentId = $category->parent_category == null ? -1 : $category->parent_category;
                    $categoryDto = new CategoryDto($category->name, $this->categoryService->get($parentId), $category->id);
                    array_push($objCategories, $categoryDto);
                }
                //
                $product = new ProductDto($objName, $objDescription, $objPrice, $objImage, $objCategories);
                array_push($productsArray, $product);
            }
        } //else return an empty array
        return $productsArray;
    }

    /**
     * ? It's better to recreate the function using a query with the given category
     * ? Instead I decied to not do so and just reuse the above method to get all prodcuts
     * ? Then do the filtering on the array
     */
    public function getAllByCategory(string $sortKey, string $sortValue, int $categoryId): array
    {
        //Get a list of products
        $productsArray = $this->getAll($sortKey, $sortValue);
        //Apply the filter
        foreach ($productsArray as $key => $product) {
            //ProductDto $product
            $exists = false;
            foreach ($product->getCategories() as $category) {
                //CategoryDto $category
                if ($category->getId() == $categoryId) {
                    $exists = true;
                    break 1;
                }
            }
            //
            if (!$exists)
                unset($productsArray[$key]);
        }
        //
        return $productsArray;
    }

    /**
     * TODO hadle non existing products
     */
    public function get(int $productId): ?ProductDto
    {
        if ($productId == -1)
            return null;
        //
        $product = $this->productRepository->get($productId);
        if ($product == null)
            return null;
        //
        $prodName = $product->name;
        $prodDescription = $product->description;
        $prodPrice = $product->price;
        $prodImage = $product->image;
        $prodCategories = array();
        foreach ($product->categories as $category) {
            $parentId = $category->parent_category == null ? -1 : $category->parent_category;
            $categoryDto = new CategoryDto($category->name, $this->categoryService->get($parentId), $category->id);
            array_push($prodCategories, $categoryDto);
        }
        //
        return new ProductDto($prodName, $prodDescription, $prodPrice, $prodImage, $prodCategories);
    }

    /**
     * 
     */
    public function add(ProductDto $product): ProductDto
    {
        throw new Exception("Error Processing Request", 1);
    }
}
