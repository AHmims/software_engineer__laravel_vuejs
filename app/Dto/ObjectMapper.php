<?php

namespace App\Dto;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Collection;

class ObjectMapper
{

    /**
     * * Convert Product object to ProductDto
     * 
     * @param array(App\Models\Product)|App\Models\Product $data
     * @return Illuminate\Support\Collection
     */
    public static function mapProductToProductDto($data): Collection
    {
        if (!$data instanceof Collection) {
            if (!is_array($data)) {
                $data = collect([$data]);
            }
        }

        $mappedData = new Collection();

        $data->each(function (Product $product) use ($mappedData) {
            $mappedData->add(new ProductDto($product->name, $product->description, $product->price, $product->image, self::mapCategoryToCategoryDto($product->categories), $product->id));
        });

        return $mappedData;
    }

    /**
     * * Convert Ctaegory to CategoryDto
     * 
     * @param array(App\Models\Category)
     * @return Illuminate\Support\Collection
     */
    public static function mapCategoryToCategoryDto($data): Collection
    {
        if (!$data instanceof Collection) {
            if (!is_array($data)) {
                $data = collect([$data]);
            }
        }

        $mappedData = new Collection();

        $data->each(function (Category $category) use ($mappedData) {
            $mappedData->add(new CategoryDto($category->name, $category->parent_category ?? -1, $category->id));
        });

        return $mappedData;
    }
}
