<?php

namespace App\Exceptions;

use App\Dto\ErrorDto;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Throwable;

class PrepareExceptionResponse
{
    /**
     * Setup ErrorDto model response for handled Exceptions errors
     * 
     * @param Throwable $e
     * @return Illuminate\Http\JsonResponse
     */
    public static function getThrowableError(ModelNotFoundException $e): JsonResponse
    {
        $message = "Error while proccessing your request";
        $code = 500;

        if (Str::contains($e->getMessage(), "No query results for model")) {
            $code = 404;
            $className = last(explode('\\', $e->getModel()));
            $message = "Data provided for $className is not valid, please provide a diffrent value.";
        }

        return new JsonResponse(new ErrorDto($message, $code), $code);
    }

    /**
     * Setup ErrorDto model response for when id given to Model binding isn't valid
     * 
     * @return Illuminate\Http\JsonResponse
     */
    public static function getNoModuleError(): JsonResponse
    {
        $code = 404;

        return new JsonResponse(new ErrorDto("There exists no data with the given Id, please provide a diffrent value.", $code), $code);
    }
}
