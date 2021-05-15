<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;

class ProductInsertionIntegrity
{
    /**
     * Check if incoming Product insertion data is valid
     *
     * TODO Exception manager
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->has(['name', 'description', 'price', 'image', 'categories']))
            throw new Exception("1 or more fields are missing", 1);

        return $next($request);
    }
}
