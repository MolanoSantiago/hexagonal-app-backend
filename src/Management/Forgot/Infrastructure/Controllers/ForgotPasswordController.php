<?php

namespace Src\Management\Forgot\Infrastructure\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Management\Forgot\Application\Mail\ForgotPasswordUseCase;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodesHelper;

final class ForgotPasswordController extends CustomController
{
    use HttpCodesHelper;

    public function __construct(private readonly ForgotPasswordUseCase $forgotPasswordUseCase)
    {
        
    }

    public function __invoke(Request $request): JsonResponse
    {
        return $this->jsonResponse($this->ok(), false, $this->forgotPasswordUseCase->__invoke($request->toArray())->entity());
    }
}