<?php

namespace Src\Application\User\Application\Destroy;

use Src\Application\User\Domain\Contracts\UserRepositoryContract;
use Src\Application\User\Domain\User;
use Src\Application\User\Domain\ValueObjects\UserId;

final class UserDestroyUseCase
{
    public function __construct(
        private readonly UserRepositoryContract $contract
    )
    {
        
    }

    public function __invoke(int $id): User
    {
        return $this->contract->delete(new UserId($id));
    }
}