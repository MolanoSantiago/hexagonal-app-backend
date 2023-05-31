<?php

namespace Src\Management\Login\Infrastructure\Repositories\FirebaseJwt;

use Exception;
use Src\Management\Login\Domain\Contracts\LoginAuthenticationContract;
use Src\Management\Login\Domain\ValueObjects\LoginAuthenticationParameters;
use Firebase\JWT\JWT;
use Src\Management\Login\Domain\ValueObjects\LoginJwt;

final class LoginAuthentication implements LoginAuthenticationContract
{
    private JWT $jwt;

    public function __construct()
    {
        $this->jwt = new JWT();
    }

    public function auth(LoginAuthenticationParameters $loginAuthenticationParameters): string
    {
        return $this->jwt::encode(
            [
                $loginAuthenticationParameters->handler()
            ],
            $loginAuthenticationParameters->jwtKey(),
            $loginAuthenticationParameters->jwtEncrypt()
        );
    }

    public function check(LoginJwt $loginJwt): bool
    {
        try {
            $decode = $this->jwt::decode($loginJwt->value(), $loginJwt->jwtKey(), $loginJwt->jwtEncrypt());
            
            if(time() > $decode[0]->exp){
                return false;
            }

            return true;

        } catch (\Throwable $th) {
            return false;
        }
    }

    public function get(LoginJwt $loginJwt): mixed
    {
        return $this->jwt::decode($loginJwt->value(), $loginJwt->jwtKey(), $loginJwt->jwtEncrypt())[0]->data;
    }
}