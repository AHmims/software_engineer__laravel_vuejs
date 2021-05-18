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
    public function get(int $id): ?Category
    {
        return Category::find($id);
    }

    /**
     * 
     */
    public function getAll(): Collection
    {
        return Category::get();
    }

    /**
     * 
     */
    public function add(array $categoryData): Category
    {
        if ($categoryData['parent_category'] != null) {
            Category::findOrFail($categoryData['parent_category']);
        }

        return Category::create($categoryData);
    }
}
