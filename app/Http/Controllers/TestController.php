<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repository\Category\CategoryRepositoryInterface;
use App\Services\Category\CategoryServiceInterface;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function get(Product $product): Product
    {
        return $product;
    }
}
