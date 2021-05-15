<?php


namespace App\Repository\Product;

use App\Dto\ProductDto;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface ProductRepositoryInterface
{
    /**
     * Get all products from database
     * 
     * @return Collection;
     */
    public function getAll(): Collection;

    /**
     * Get Product by id
     * 
     * @return Product
     */
    public function get(int $productId): ?Product;

    /**
     * 
     */
    public function store(Request $request);
}
