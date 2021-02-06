<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HealthcheckController extends Controller
{
    public function healthcheck(): JsonResponse
    {
        try {
            DB::connection()->getPdo();
            return new JsonResponse(true, 200);
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            return new JsonResponse($exception->getMessage(), 404);
        }
    }
}
