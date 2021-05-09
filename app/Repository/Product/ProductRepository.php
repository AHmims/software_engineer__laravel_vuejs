<?php

namespace App\Repository\Product;

use App\Models\Product;
use App\Repository\Category\CategoryRepositoryInterface;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ProductRepository implements ProductRepositoryInterface
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    //Get all products
    public function getAll(): Collection
    {
        return Product::with("categories")->get();
    }
    //Add product
    public function store(Request $request)
    {
        try {
            $product = $this->toProduct($request);
            if ($product == null)
                throw new Exception("Error Processing Request");
            //

            $categories = array();
            for ($i = 0; $i < count($request->categories); $i++) {
                $categories[$i] = $this->categoryRepository->get($request->categories[$i]);
            }

            $product->save();
            $product->categories()->saveMany($categories);
            return "good";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    //
    private function toProduct(Request $request)
    {
        try {
            $product = new Product();
            //
            if ($request->name == null || strlen($request->name) <= 0)
                throw new Exception("Bad name");
            $product->name = $request->name;
            //
            if ($request->description == null || strlen($request->description) <= 0)
                throw new Exception("Bad description");
            $product->description = $request->description;
            //
            if ($request->price == null || $request->price <= 0)
                throw new Exception("Bad price");
            $product->price = $request->price;
            //
            if ($request->image == null || strlen($request->image) <= 0)
                throw new Exception("Bad image");
            $product->image = $request->image;
            //
            if (count($request->categories) == 0)
                throw new Exception("No category");

            //
            return $product;
        } catch (Exception $e) {
            return null;
        }
    }
}
