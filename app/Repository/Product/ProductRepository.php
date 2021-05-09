<?php

namespace App\Repository\Product;

use App\Models\Product;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ProductRepository implements ProductRepositoryInterface
{
    //Get all products
    public function getAll(): Collection
    {
        return Product::all();
    }
    //Add product
    public function store(Request $request)
    {
        try {
            $product = new Product();
            // return $request->name;
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->image = $request->image;
            $product->save();
            return "good";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
