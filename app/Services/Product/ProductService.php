<?php

namespace App\Services\Product;

use App\Dto\CategoryDto;
use App\Dto\ObjectMapper;
use App\Dto\ProductDto;
use App\Http\Filters\ProductSort;
use App\Models\Product;
use App\Repository\Category\CategoryRepositoryInterface;
use App\Repository\Product\ProductRepositoryInterface;
use App\Services\Category\CategoryServiceInterface;
use Exception;
use Illuminate\Support\Collection;

class ProductService implements ProductServiceInterface
{
    #region Dependencies injection

    private $productRepository, $categoryService, $categoryRepository;

    public function __construct(ProductRepositoryInterface $productRepository, CategoryServiceInterface $categoryService, CategoryRepositoryInterface $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryService = $categoryService;
        $this->categoryRepository = $categoryRepository;
    }

    #endregion


    /**
     * TODO create custom exception handler
     */
    public function getAll(ProductSort $filter): Collection
    {
        return ObjectMapper::mapProductToProductDto($this->productRepository->getAll($filter));
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
     * TODO create custom exception handler
     */
    public function add(string $name, string $description, $price, string $image, array $categories): ProductDto
    {
        $productDto = new ProductDto($name, $description, $price, $image, $categories);
        $isValid = $productDto->validate();
        //
        if (!$isValid)
            throw new Exception("Data is not valid", 1);
        //
        //Setup Product model
        $product = new Product([
            "name" => $productDto->getName(),
            "description" => $productDto->getDescription(),
            "price" => $productDto->getPrice(),
            "image" => $productDto->getImage()
        ]);
        // Setup categories
        $categories = array();
        for ($i = 0; $i < count($productDto->getCategories()); $i++) {
            $tempCategory = $this->categoryRepository->get($productDto->getCategories()[$i]);
            if ($tempCategory == null)
                throw new Exception("Bad category", 1);
            $categories[$i] = $tempCategory;
        }
        //
        //Insert product in DB
        $product = $this->productRepository->add($product, $categories);
        //
        //Update ProductDto object
        $productDto->setId($product->id);
        $prodCategories = array();
        //map Category to CategoryDto
        foreach ($product->categories as $key => $category) {
            $parentId = $category->parent_category == null ? -1 : $category->parent_category;
            $categoryDto = new CategoryDto($category->name, $this->categoryService->get($parentId), $category->id);
            array_push($prodCategories, $categoryDto);
        }
        $productDto->setCategories($prodCategories);
        //

        return $productDto;
    }
}
