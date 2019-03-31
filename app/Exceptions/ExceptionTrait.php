<?php

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


trait  ExceptionTrait
{
    public function apiException( $request, $e)
    {

        if ($this->isModel($e)) {
            return $this->ModelResponse();
        }

        if ($this->isHttp($e)) {
            return $this->HttpResponse();
        }
        return parent::render($request, $e);
    }

    protected function isModel($arg)
    {
        return $arg instanceof ModelNotFoundException;
    }

    protected function isHttp($arg2)
    {
        return $arg2 instanceof NotFoundHttpException;
    }

    protected function ModelResponse()
    {
        return response()->json(['errors' => 'Model Product not found'], Response::HTTP_NOT_FOUND);
    }

    protected function HttpResponse()
    {
        return response()->json(['error' => 'Not Correct Route.'], Response::HTTP_NOT_FOUND);
    }



}