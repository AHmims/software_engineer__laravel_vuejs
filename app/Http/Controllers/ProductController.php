<?php

namespace App\Http\Controllers;

use App\Repository\Product\ProductRepository;
use App\Repository\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    #region Dependencies injection

    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    #endregion

    /**
     * Display a listing of the resource.
     *
     * @return \
     */
    public function getAll(Request $request)
    {
        $order = $request->query('order');
        $products = $this->productRepository->getAll($order != null ? $order != "desc" : false);

        return $products;
    }

    public function index2(Request $request)
    {
        $order = $request->query('order');
        if ($order == null)
            $order = false;
        $category = $request->query('category');
        //return $order == "asc" ? true : false;
        $products = $this->productRepository->getAllByCategory($order, $category);

        return $products;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
