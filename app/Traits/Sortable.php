<?php

namespace App\Traits;

use App\Http\Filters\AbstractBaseFilter;
use Illuminate\Database\Eloquent\Builder;

trait Sortable
{
    /**
     * Apply filters.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  \App\Http\Filters\BaseFilter  $filter
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter(Builder $query, AbstractBaseFilter $filter): Builder
    {
        return $filter->apply($query);
    }
}
