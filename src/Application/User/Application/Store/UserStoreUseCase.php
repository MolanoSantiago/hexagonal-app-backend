<?php

namespace Src\Application\User\Application\Store;

use Src\Application\User\Domain\Contracts\UserRepositoryContract;
use Src\Application\User\Domain\User;
use Src\Application\User\Domain\ValueObjects\UserStore;
use Src\Shared\Infrastructure\Middleware\RoleMiddleware;

final class UserStoreUseCase
{
    public function __construct(
        private readonly UserRepositoryContract $contract
    )
    {
        
    }

    public function __invoke(array $request): User
    {
        return $this->contract->store(new UserStore($request));
    }
}