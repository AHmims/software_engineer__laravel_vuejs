<?php

namespace App\Repository\Category;

use App\Models\Category;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * 
     */
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
            abort(500);
        }
    }

    /**
     * TODO Exception manager
     */
    public function get(int $id): Category
    {
        return Category::find($id);
    }

    /**
     * 
     */
    public function getAll($byPriceAsc = true): Collection
    {
        return Category::with(["products" => function ($q) use ($byPriceAsc) {
            $q->orderBy("price", $byPriceAsc ? "asc" : "desc");
        }])->get();
    }
}
