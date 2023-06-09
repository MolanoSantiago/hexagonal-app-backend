<?php

namespace Src\Application\User\Infrastructure\Repositories\Eloquent;

use Src\Application\User\Domain\Contracts\UserRepositoryContract;
use Src\Application\User\Domain\User;
use Src\Application\User\Domain\ValueObjects\UserId;
use Src\Application\User\Domain\ValueObjects\UserStore;
use Src\Application\User\Domain\ValueObjects\UserUpdate;
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

    public function store(UserStore $store): User
    {
        $save = $this->model->create($store->handler());

        if(!$save) {
            return new User(null, 'FAILED_STORE');
        }

        return new User($save->toArray());
    }

    public function update(UserUpdate $update, UserId $id): User
    {
        $record = $this->model->find($id->value());

        if(!$record) {
            return new User(null, 'USER_NOT_FOUND');
        }

        $record->update($update->handler());

        if(!$record) {
            return new User(null, 'FAILED_UPDATE');
        }

        return new User($record->toArray());
    }

    public function delete(UserId $id): User
    {
        $record = $this->model->find($id->value());
        
        if(!$record) {
            return new User(null, 'USER_NOT_FOUND');
        }
        
        $record->delete();

        return new User("User deleted successfully");
    }
}