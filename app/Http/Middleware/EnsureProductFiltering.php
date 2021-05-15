<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;

class EnsureProductFiltering
{
    /**
     * Ensure the validity of incoming category id 
     * TODO Exception manager
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!ctype_digit($request->route('categoryId')))
            throw new Exception("Error Processing Request", 1);
        return $next($request);
    }
}
