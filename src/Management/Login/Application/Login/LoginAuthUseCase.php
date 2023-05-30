<?php

namespace Src\Management\Login\Application\Login;

use Src\Management\Login\Application\Auth\LoginAuthenticationUseCase;
use Src\Management\Login\Domain\Contracts\LoginRepositoryContract;
use Src\Management\Login\Domain\Login;
use Src\Management\Login\Domain\ValueObjects\LoginAuth;

final class LoginAuthUseCase
{

    public function __construct(
        private readonly LoginRepositoryContract $loginRepositoryContract,
        private readonly LoginAuthenticationUseCase $loginAuthenticationUseCase
    ) {
    }

    public function __invoke(array $request): Login
    {
        $login = $this->loginRepositoryContract->login(new LoginAuth($request));
        $jwt = $this->loginAuthenticationUseCase->__invoke($login->handler());

        return New Login(array_merge($login->handler(), [
            "jwt" => $jwt
        ]));
    }
}
