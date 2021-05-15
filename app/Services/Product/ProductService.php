<?php

namespace App\Services\Product;

use App\Dto\CategoryDto;
use App\Dto\ProductDto;
use App\Repository\Product\ProductRepositoryInterface;
use Exception;

class ProductService implements ProductServiceInterface
{
    #region Dependencies injection

    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
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
        else {
            if (!in_array($sortValue, $sortingMethods))
                throw new Exception("Error Processing Request", 1);
        }
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
            for ($i = 0; $i < sizeof($tempArray); $i++) {
                $obj = $tempArray[$i];
                //
                $objName = $obj->name;
                $objDescription = $obj->description;
                $objPrice = $obj->price;
                $objImage = $obj->image;
                $objCategories = array();
                foreach ($obj->categories as $category) {
                    array_push($objCategories, new CategoryDto($category->name, null, $category->id));
                }
                //
                $product = new ProductDto($objName, $objDescription, $objPrice, $objImage, $objCategories);
                error_log($product->getName());
                array_push($productsArray, $product);
            }
        } //else return an empty array
        error_log(json_encode($productsArray));
        return $productsArray;
    }

    /**
     * 
     */
    public function get(string $id): ProductDto
    {
        throw new Exception("Error Processing Request", 1);
    }

    /**
     * 
     */
    public function add(ProductDto $product): ProductDto
    {
        throw new Exception("Error Processing Request", 1);
    }
}
