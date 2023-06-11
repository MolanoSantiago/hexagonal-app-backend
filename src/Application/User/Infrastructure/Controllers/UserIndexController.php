<?php

namespace Src\Application\User\Infrastructure\Controllers;

use Illuminate\Http\JsonResponse;
use Src\Application\User\Application\Get\UserIndexUseCase;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodesHelper;
use Src\Shared\Infrastructure\Middleware\RoleMiddleware;

final class UserIndexController extends CustomController
{
    use HttpCodesHelper;

    public function __construct(
        private readonly UserIndexUseCase $useCaseIndex
    )
    {
        $this->middleware(RoleMiddleware::class, [
            'role' => 'master'
        ]);
    }

    public function __invoke(): JsonResponse
    {
        return $this->jsonResponse($this->ok(), false, $this->useCaseIndex->__invoke()->entity());
    }
}