<?php

namespace Src\Application\User\Application\Update;

use Src\Application\User\Domain\Contracts\UserRepositoryContract;
use Src\Application\User\Domain\User;
use Src\Application\User\Domain\ValueObjects\UserId;
use Src\Application\User\Domain\ValueObjects\UserUpdate;

final class UserUpdateUseCase
{
    public function __construct(
        private readonly UserRepositoryContract $contract
    )
    {
        
    }

    public function __invoke(array $request, int $id): User
    {
        return $this->contract->update(new UserUpdate($request), new UserId($id));
    }
}