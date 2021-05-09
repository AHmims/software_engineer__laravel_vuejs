<?php


namespace App\Repository\Category;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface CategoryRepositoryInterface
{
    public function store(Request $request);

    public function get(int $id);

    public function getAll(): Collection;
}
