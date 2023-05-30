<?php

namespace Src\Management\Login\Domain\Contracts;

use Src\Management\Login\Domain\ValueObjects\LoginAuthenticationParameters;

interface LoginAuthenticationContract
{
    public function auth(LoginAuthenticationParameters $loginAuthenticationParameters): string;
}