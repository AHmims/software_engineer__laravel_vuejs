<?php

namespace App\Services;

use App\Dto\ProductDto;
use App\Repository\Product\ProductRepositoryInterface;

class ProductService implements ProductServiceInterface
{
    /**
     * 
     */
    public function getAll(): array
    {
        return [1, 2];
    }

    /**
     * 
     */
    public function get(string $id): ProductDto
    {
    }

    /**
     * 
     */
    public function add(ProductDto $product): ProductDto
    {
    }
}
