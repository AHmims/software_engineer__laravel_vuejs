<?php


namespace App\Repository\Product;

use App\Dto\ProductDto;
use App\Http\Filters\ProductSort;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface ProductRepositoryInterface
{
    /**
     * * Get all products from database sorted by provided filter
     * 
     * @param App\Http\Filters\ProductSort $filter
     * @return Collection;
     */
    public function getAll(ProductSort $filter): Collection;

    /**
     * * Get Product by id
     * 
     * @param int $productId
     * @return Product
     */
    public function get(int $productId): ?Product;

    /**
     * * Insert new Product
     * 
     * @param Product $product
     * @param array<Category> $categories
     * @return void
     */
    public function add(Product $product, array $categories): Product;
}
