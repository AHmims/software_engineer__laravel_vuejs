<?php

namespace App\Http\Controllers;

use App\Dto\ProductDto;
use App\Services\Product\ProductServiceInterface;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

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
     * -> @param string $request->query('sortKey') | Sorting pointer
     * -> @param string $request->query('sortValue') | Sorting method
     * @param string $category
     * @return array<ProductDto>
     */
    public function getAllByCategory(Request $request, $categoryId): array
    {
        return $this->productService->getAllByCategory($request->query('sortKey'), $request->query('sortValue'), intval($categoryId));
    }

    /**
     * Returns the request product by id
     * @param string $productId
     * @return ProductDto
     */
    public function get(Request $request, $productId): ?ProductDto
    {
        return $this->productService->get(intval($productId));
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
