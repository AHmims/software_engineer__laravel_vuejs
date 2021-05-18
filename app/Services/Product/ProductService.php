<?php

namespace App\Services\Product;

use App\Dto\ObjectMapper;
use App\Dto\ProductDto;
use App\Http\Filters\ProductSort;
use App\Models\Product;
use App\Repository\Category\CategoryRepositoryInterface;
use App\Repository\Product\ProductRepositoryInterface;
use App\Services\Category\CategoryServiceInterface;
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
     * 
     */
    public function get(Product $product): ProductDto
    {
        $product->load('categories');
        return (ObjectMapper::mapProductToProductDto($product))->first();
    }

    /**
     * 
     */
    public function add(array $productData): ProductDto
    {
        $product = $this->productRepository->add($productData);
        return (ObjectMapper::mapProductToProductDto($product))->first();
    }
}
