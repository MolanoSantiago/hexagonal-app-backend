<?php

namespace Src\Shared\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class CustomController extends Controller
{
    /**
     * @param int $status
     * @param bool $error
     * @param array|string|int|bool $response
     * @return JsonResponse
     */
    protected function jsonResponse(int $status, bool $error, array | string | int | bool $response): JsonResponse
    {
        return response()->json([
            "status" => $status,
            "error" => $error,
            "message" => $response,
        ]);
    }
}
