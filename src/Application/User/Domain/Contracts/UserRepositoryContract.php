<?php

namespace Src\Application\User\Domain\Contracts;

use Src\Application\User\Domain\User;
use Src\Application\User\Domain\ValueObjects\UserId;
use Src\Application\User\Domain\ValueObjects\UserStore;
use Src\Application\User\Domain\ValueObjects\UserUpdate;

interface UserRepositoryContract
{
    public function index(): User;

    public function show(UserId $id): User;

    public function store(UserStore $store): User;

    public function update(UserUpdate $update, UserId $id): User;

    public function delete(UserId $id): User;
}