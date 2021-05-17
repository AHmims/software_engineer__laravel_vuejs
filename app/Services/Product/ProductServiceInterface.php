<?php

namespace App\Services\Product;

use App\Dto\ProductDto;
use App\Http\Filters\ProductSort;
use App\Models\Product;
use Illuminate\Support\Collection;

interface ProductServiceInterface
{
    /**
     * * Get a list of products
     * 
     * @param App\Http\Filters\ProductSort $filter
     * @return Collection<ProductDto> | List of all products
     */
    public function getAll(ProductSort $filter): Collection;

    /**
     * * Get a list of products filtered by category
     * 
     * @param string $sortKey | Sorting pointer, can be 'price' || 'name'
     * @param string $sortValue | Sorting direction, can be 'asc' || 'desc'
     * @param int $categoryId | Category id
     * @return array<ProductDto> | List of all products
     */
    public function getAllByCategory(string $sortKey, string $sortValue, int $categoryId): array;

    /**
     * * Get a product by its id
     * 
     * @param App\Models\Product $product
     * @return App\Dto\ProductDto
     */
    public function get(Product $product): ProductDto;

    /**
     * * Insert a product
     * 
     * @param string $nam | Product name
     * @param string $description | Product description
     * @param double $price | Product price
     * @param string $image | Product image
     * @param array<int> $categories | Product categories
     * @return ProductDto | Inserted product
     */
    public function add(string $name, string $description, $price, string $image, array $categories): ProductDto;
}
