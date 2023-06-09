<?php

namespace Src\Application\User\Infrastructure\Controllers;

use Illuminate\Http\JsonResponse;
use Src\Application\User\Application\Update\UserUpdateUseCase;
use Src\Application\User\Infrastructure\Request\UserUpdateRequest;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodesHelper;
use Src\Shared\Infrastructure\Middleware\RoleMiddleware;

final class UserUpdateController extends CustomController
{
    use HttpCodesHelper;

    public function __construct(
        private readonly UserUpdateUseCase $useCaseUpdate
    )
    {
        $this->middleware(RoleMiddleware::class, [
            'role' => '*'
        ]);
    }

    public function __invoke(UserUpdateRequest $request, int $id): JsonResponse
    {
        return $this->jsonResponse($this->updated(), false, $this->useCaseUpdate->__invoke($request->toArray(), $id)->entity());
    }
}