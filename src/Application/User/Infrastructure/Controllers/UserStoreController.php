<?php

namespace Src\Application\User\Infrastructure\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Application\User\Application\Store\UserStoreUseCase;
use Src\Application\User\Infrastructure\Request\UserStoreRequest;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodesHelper;
use Src\Shared\Infrastructure\Middleware\RoleMiddleware;

final class UserStoreController extends CustomController
{
    use HttpCodesHelper;

    public function __construct(
        private readonly UserStoreUseCase $useCaseStore
    )
    {
        $this->middleware(RoleMiddleware::class, [
            'role' => 'master'
        ]);
    }

    public function __invoke(UserStoreRequest $request): JsonResponse
    {
        return $this->jsonResponse($this->created(), false, $this->useCaseStore->__invoke($request->toArray())->entity());
    }
}