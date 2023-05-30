<?php

namespace Src\Management\Login\Application\Login;

use Src\Management\Login\Domain\Contracts\LoginRepositoryContract;
use Src\Management\Login\Domain\ValueObjects\LoginAuth;

final class LoginAuthUseCase
{

    public function __construct(
        private readonly LoginRepositoryContract $loginRepositoryContract
    ) {
    }

    public function __invoke(array $request)
    {
        return $this->loginRepositoryContract->login(new LoginAuth($request));
    }
}
