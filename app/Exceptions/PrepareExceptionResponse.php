<?php

namespace App\Exceptions;

use App\Dto\ErrorDto;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Throwable;

class PrepareExceptionResponse
{
    /**
     * Setup ErrorDto model response for handled Exceptions errors
     * 
     * @param Throwable $e
     * @return App\Dto\ErrorDto
     */
    public static function getError(ModelNotFoundException $e): JsonResponse
    {
        $message = "Error while proccessing your request";
        $code = 500;

        if (Str::contains($e->getMessage(), "No query results for model")) {
            $code = 404;
            $className = last(explode('\\', $e->getModel()));
            $message = "Data provided for $className is not valid, please provide a diffrent value";
        }

        return new JsonResponse(new ErrorDto($message, $code), $code);
    }
}
