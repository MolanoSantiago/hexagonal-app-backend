<?php

namespace Src\Application\User\Infrastructure\Controllers;

use Src\Application\User\Application\Get\UserShowUseCase;
use Src\Shared\Infrastructure\Controllers\CustomController;
use Src\Shared\Infrastructure\Helper\HttpCodesHelper;

final class UserShowController extends CustomController
{
    use HttpCodesHelper;

    public function __construct(
        private readonly UserShowUseCase $useCaseShow
    )
    {
        
    }

    public function __invoke(int $id)
    {
        return $this->jsonResponse($this->ok(), false, $this->useCaseShow->__invoke($id)->entity());
    }
}