<?php

namespace Src\Application\User\Domain\Contracts;

use Src\Application\User\Domain\User;
use Src\Application\User\Domain\ValueObjects\UserId;

interface UserRepositoryContract
{
    public function index(): User;

    public function show(UserId $id): User;
}