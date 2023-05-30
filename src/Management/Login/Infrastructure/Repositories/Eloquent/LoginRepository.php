<?php

namespace Src\Management\Login\Infrastructure\Repositories\Eloquent;

use Src\Management\Login\Domain\Contracts\LoginRepositoryContract;
use Src\Management\Login\Domain\Login;
use Src\Management\Login\Domain\ValueObjects\LoginAuth;

final class LoginRepository implements LoginRepositoryContract
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function login(LoginAuth $loginAuth): Login
    {
        $user = $this->userByEmail($loginAuth->value()['email']);

        if (!$user) {
            return new Login(null, 'EMAIL_OR_PASSWORD_INCORRECT');
        }

        $check = $loginAuth->checkPassword($loginAuth->value()['password'], $user['password']);

        if (!$check) {
            return new Login(null, 'EMAIL_OR_PASSWORD_INCORRECT');
        }

        return new Login($user, null);
    }

    private function userByEmail(string $email): ?array
    {
        $user = $this->user->where('email', $email)->select('id', 'name', 'email', 'password')->first();

        return $user?->makeVisible('password')->toArray();
    }
}
