<?php

namespace Src\Application\User\Infrastructure\Controllers;

use Illuminate\Http\JsonResponse;
use Src\Application\User\Application\Destroy\UserDestroyUseCase;
use Src\Application\User\Infrastructure\Request\UserStoreRequest;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodesHelper;

final class UserDestroyController extends CustomController
{
    use HttpCodesHelper;

    public function __construct(
        private readonly UserDestroyUseCase $useCaseDestroy
    )
    {
    }

    public function __invoke(int $id): JsonResponse
    {
        return $this->jsonResponse($this->ok(), false, $this->useCaseDestroy->__invoke($id)->entity());
    }
}