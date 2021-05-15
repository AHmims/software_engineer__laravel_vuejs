<?php


namespace App\Repository\Product;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface ProductRepositoryInterface
{
    /**
     * Get all products from database
     * @return Collection;
     */
    public function getAll(): Collection;

    /**
     * 
     */
    public function getAllByCategory($byPriceAsc, $category);

    /**
     * 
     */
    public function store(Request $request);
}
