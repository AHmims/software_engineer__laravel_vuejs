<?php


namespace App\Repository\Product;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface ProductRepositoryInterface
{
    public function getAll(): Collection;
    public function store(Request $request);
}
