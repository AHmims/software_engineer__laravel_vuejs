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
     * * Get a product by its id
     * 
     * @param App\Models\Product $product
     * @return App\Dto\ProductDto
     */
    public function get(Product $product): ProductDto;

    /**
     * * Insert a product
     * 
     * @param array $productData
     * @return ProductDto | Inserted product
     */
    public function add(array $productData): ProductDto;
}
