<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

/**
 * * Reference https://pineco.de/filtering-eloquent-queries-based-on-http-requests/
 */
abstract class AbstractBaseFilter
{
    /**
     * * Request instance
     * 
     * @var Illuminate\Http\Request
     */
    protected Request $request;

    /**
     * * Builder instance
     * 
     * @var Illuminate\Database\Eloquent\Builder
     */
    protected Builder $builder;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * * Apply filter to builder
     * 
     * @param  Illuminate\Database\Eloquent\Builder  $builder
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function apply(Builder $builder): Builder
    {
        $this->builder = $builder;

        foreach ($this->request->all() as $key => $value) {
            if (method_exists($this, $key)) {
                call_user_func_array([$this, $key], array_filter([$value]));
            }
        }

        return $this->builder;
    }
}
