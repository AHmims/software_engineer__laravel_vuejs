<?php

namespace App\Services;

use App\Dto\ProductDto;

interface ProductServiceInterface
{
    /**
     * * Get a list of products
     * @return array<ProductDto>
     */
    public function getAll(): array;

    /**
     * * Get a product by its id
     * @param string $id;
     * @return ProductDto
     */
    public function get(string $id): ProductDto;

    /**
     * * Insert a product
     * @param ProductDto $product
     * @return ProductDto
     */
    public function add(ProductDto $product): ProductDto;
}
