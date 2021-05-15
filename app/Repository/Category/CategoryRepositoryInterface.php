<?php


namespace App\Repository\Category;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface CategoryRepositoryInterface
{
    /**
     * 
     */
    public function store(Request $request);

    /**
     * Get category by id
     * @param int $id
     * @return Category || null
     */
    public function get(int $id): ?Category;

    /**
     * 
     */
    public function getAll($byPriceAsc): Collection;
}
