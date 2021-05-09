<?php

namespace App\Repository\Category;

use App\Models\Category;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CategoryRepository implements CategoryRepositoryInterface
{
    //
    public function store(Request $request)
    {
        try {
            $parentCategory = $this->get($request->parent);
            $category = new Category();
            $category->name = $request->name;
            $category->parent_category = $parentCategory != null ? $parentCategory->id : null;
            $category->save();
            return "good";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    //
    public function get($id)
    {
        try {
            if ($id == null || $id < 0)
                throw new Exception("Error Processing Value");
            return Category::find($id);
        } catch (Exception $e) {
            return null;
        }
    }
    //
    public function getAll(): Collection
    {
        return Category::with("products")->get();
        // return Category::all();
    }
}
