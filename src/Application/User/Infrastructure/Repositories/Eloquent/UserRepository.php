<?php

namespace Src\Application\User\Infrastructure\Repositories\Eloquent;

use Src\Application\User\Domain\Contracts\UserRepositoryContract;
use Src\Application\User\Domain\User;
use Src\Application\User\Domain\ValueObjects\UserId;
use Src\Application\User\Infrastructure\Repositories\Eloquent\User as Model;

final class UserRepository implements UserRepositoryContract
{
    private Model $model;

    public function __construct()
    {
        $this->model = new Model();
    }

    public function index(): User
    {
        $index = $this->model->with('state')->get();
        return new User($index->toArray());
    }

    public function show(UserId $UserId): User
    {
        $user = $this->model->where('id', $UserId->value())->get();

        if(empty($user->toArray())) {
            return new User(null, 'USER_NOT_FOUND');
        }

        return new User($user->toArray());
    }
}