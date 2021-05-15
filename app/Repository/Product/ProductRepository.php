<?php

namespace App\Repository\Product;

use App\Dto\ProductDto;
use App\Models\Category;
use App\Models\Product;
use App\Repository\Category\CategoryRepositoryInterface;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ProductRepository implements ProductRepositoryInterface
{
    #region Dependencies injection

    public function __construct()
    {
    }

    #endregion

    /**
     * 
     */
    public function getAll(): Collection
    {
        return Product::with("categories")->get();
    }

    /**
     * 
     */
    public function get(int $productId): ?Product
    {
        return Product::find($productId);
    }

    /**
     * TODO Exception handler
     */
    public function add(Product $product, array $categories): Product
    {
        $product->save();
        $product->categories()->saveMany($categories);
        //
        return $product->refresh();
    }
}
