<?php

namespace Src\Management\Login\Infrastructure\Repositories\Eloquent;

use Src\Management\Login\Domain\Contracts\LoginRepositoryContract;
use Src\Management\Login\Domain\Login;
use Src\Management\Login\Domain\ValueObjects\LoginAuth;

final class LoginRepository implements LoginRepositoryContract
{
    public function login(LoginAuth $loginAuth): Login
    {
        return new Login($loginAuth->value(), null);
    }
}