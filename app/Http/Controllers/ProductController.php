<?php

namespace App\Http\Controllers;

use App\Dto\ProductDto;
use App\Http\Filters\ProductSort;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Services\Product\ProductServiceInterface;
use Illuminate\Support\Collection;

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
     * * Returns a list of all Products
     * 
     * @param App\Http\Filters\ProductSort $filter
     * @return Illuminate\Support\Collection<ProductDto>
     */
    public function getAll(ProductSort $filter): Collection
    {
        return $this->productService->getAll($filter);
    }

    /**
     * * Returns the request product by id
     * 
     * @param App\Models\Product $product
     * @return ProductDto
     */
    public function get(Product $product): ProductDto
    {
        return $this->productService->get($product);
    }

    /**
     * * Add new product
     *
     * @param ProductRequest $request
     * @return App\Dto\ProductDto
     */
    public function insert(ProductRequest $request): ProductDto
    {
        $request->validated();
        return $this->productService->add($request->all());
    }
}
