<?php

namespace Src\Management\Login\Application\Auth;

use Src\Management\Login\Domain\Contracts\LoginAuthenticationContract;
use Src\Management\Login\Domain\Login;
use Src\Management\Login\Domain\ValueObjects\LoginJwt;

final class LoginAuthenticationRoleUseCase
{
    public function __construct(
        private readonly LoginAuthenticationContract $loginAuthenticationContract
    )
    {
        
    }

    public function __invoke(string $jwt, string|array $typeRoles): bool
    {
        $login = new Login([
            'user' => $this->loginAuthenticationContract->get(new LoginJwt($jwt)),
            'typeRoles' => $typeRoles
        ]);

        return $login->getCheckRole();
    }
}
