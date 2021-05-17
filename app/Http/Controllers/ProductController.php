<?php

namespace App\Http\Controllers;

use App\Dto\ProductDto;
use App\Http\Filters\ProductSort;
use App\Models\Product;
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
     * * Returns a list of all Products
     * 
     * @param Request $request
     * -> @param string $request->query('sortKey') | Sorting pointer
     * -> @param string $request->query('sortValue') | Sorting method
     * @return array<ProductDto>
     */
    public function getAll(ProductSort $filter)
    {
        // return $this->productService->getAll($request->query('sortKey'), $request->query('sortValue'));
        return Product::filter($filter)->orderBy('created_at', 'desc')->paginate(2);
    }

    /**
     * * Returns a list of all products filtered by Category
     * 
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
     * * Returns the request product by id
     * 
     * @param int $productId
     * @return ProductDto
     */
    public function get(Request $request, $productId): ?ProductDto
    {
        return $this->productService->get(intval($productId));
    }

    /**
     * * Add new product
     *
     * @param Request $request
     * -> @param string $request->name | Product name
     * -> @param string $request->description | Product description
     * -> @param double $request->price | Product price
     * -> @param string $request->image | Product image
     * -> @param array<int> $request->categories | Product categories
     * @return 
     */
    public function insert(Request $request)
    {
        return $this->productService->add($request->name, $request->description, $request->price, $request->image, $request->categories);
    }
}
