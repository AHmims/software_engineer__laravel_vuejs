<?php

namespace App\Http\Controllers;

use App\Services\Product\ProductServiceInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    #region Dependencies injection

    private $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    #endregion

    /**
     * Returns a list of all Products
     * @param Request $request
     * -> @param string $request->query('sortKey') | Sorting pointer
     * -> @param string $request->query('sortValue') | Sorting method
     * @return array<ProductDto>
     */
    public function getAll(Request $request): array
    {
        return $this->productService->getAll($request->query('sortKey'), $request->query('sortValue'));
    }

    /**
     * Returns a list of all products filtered by Category
     * @param Request $request
     */
    public function getAllByCategory(Request $request, $category)
    {
        /*
        $order = $request->query('order');
        if ($order == null)
            $order = false;
        $category = $request->query('category');
        //return $order == "asc" ? true : false;
        $products = $this->productRepository->getAllByCategory($order, $category);

        return $products;
        //
        */
        return $category;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->productRepository->store($request);
    }
}
