<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureProductListingParams
{
    /**
     * Ensure that the request has the required params => sortKey & sortValue
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->query('sortKey') == null)
            $request->merge([
                'sortKey' => 'name',
            ]);
        if ($request->query('sortValue') == null)
            $request->merge([
                'sortValue' => 'asc',
            ]);
        //
        return $next($request);
    }
}
