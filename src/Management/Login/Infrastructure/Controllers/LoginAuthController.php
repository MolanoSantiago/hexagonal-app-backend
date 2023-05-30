<?php

namespace Src\Management\Login\Infrastructure\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodesHelper;
use Src\Management\Login\Application\Login\LoginAuthUseCase;

final class LoginAuthController extends CustomController
{
    use HttpCodesHelper;

    public function __construct(private LoginAuthUseCase $loginAuthUseCase)
    {
    }

    public function __invoke(Request $request): JsonResponse
    {
        // dd($request->toArray());
        return $this->jsonResponse($this->ok(), false, $this->loginAuthUseCase->__invoke($request->toArray())->entity());
    }
}
