<?php

namespace Src\Application\User\Infrastructure\Controllers;

use Illuminate\Http\JsonResponse;
use Src\Application\User\Application\Get\UserShowUseCase;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodesHelper;
use Src\Shared\Infrastructure\Middleware\RoleMiddleware;

final class UserShowController extends CustomController
{
    use HttpCodesHelper;

    public function __construct(
        private readonly UserShowUseCase $useCaseShow
    )
    {
        $this->middleware(RoleMiddleware::class, [
            'role' => '*'
        ]);
    }

    public function __invoke(int $id): JsonResponse
    {
        return $this->jsonResponse($this->ok(), false, $this->useCaseShow->__invoke($id)->entity());
    }
}