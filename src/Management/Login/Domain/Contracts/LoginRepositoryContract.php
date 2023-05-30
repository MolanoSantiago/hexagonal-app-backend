<?php

namespace Src\Management\Login\Domain\Contracts;

use Src\Management\Login\Domain\Login;
use Src\Management\Login\Domain\ValueObjects\LoginAuth;

interface LoginRepositoryContract
{
    public function login(LoginAuth $loginAuth): Login;
}