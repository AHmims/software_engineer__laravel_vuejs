<?php

namespace App\Repository\Product;

use App\Http\Filters\ProductSort;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository implements ProductRepositoryInterface
{
    /**
     * 
     */
    public function getAll(ProductSort $filter): Collection
    {
        return Product::with("categories")->filter($filter)->orderBy('created_at', 'desc')->get();
    }

    /**
     * 
     */
    public function get(int $productId): ?Product
    {
        return Product::find($productId);
    }

    /**
     * 
     */
    public function add(array $productData): Product
    {
        $categories = new Collection();

        foreach ($productData['categories'] as $key => $categoryId) {
            $categories->add(Category::findOrFail($categoryId));
        }

        $product = Product::create($productData);
        $product->categories()->saveMany($categories);

        return $product;
    }
}
