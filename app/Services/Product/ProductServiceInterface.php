<?php

namespace App\Services\Product;

use App\Dto\ProductDto;

interface ProductServiceInterface
{
    /**
     * * Get a list of products
     * @param string $sortKey | Sorting pointer, can be 'price' || 'name'
     * @param string $sortValue | Sorting direction, can be 'asc' || 'desc'
     * @return array<ProductDto> | List of all products
     */
    public function getAll(string $sortKey, string $sortValue): array;

    /**
     * * Get a list of products filtered by category
     * @param string $sortKey | Sorting pointer, can be 'price' || 'name'
     * @param string $sortValue | Sorting direction, can be 'asc' || 'desc'
     * @param int $categoryId | Category id
     * @return array<ProductDto> | List of all products
     */
    public function getAllByCategory(string $sortKey, string $sortValue, int $categoryId): array;

    /**
     * * Get a product by its id
     * @param int $id | id of product to get
     * @return ProductDto | Found product
     */
    public function get(int $productId): ?ProductDto;

    /**
     * * Insert a product
     * @param ProductDto $product | Data of product to insert
     * @return ProductDto | Inserted product
     */
    public function add(ProductDto $product): ProductDto;
}
