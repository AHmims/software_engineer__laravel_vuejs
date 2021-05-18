<?php


namespace App\Repository\Category;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface CategoryRepositoryInterface
{
    /**
     * * Get category by id
     * 
     * @param int $id
     * @return Category || null
     */
    public function get(int $id): ?Category;

    /**
     * * Get listing of all categories
     * 
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * * Insert new Category
     * 
     * @param array $categoryData
     * @return App\Models\Category
     */
    public function add(array $categoryData): Category;
}
