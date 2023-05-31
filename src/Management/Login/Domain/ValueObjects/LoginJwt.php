<?php

namespace Src\Management\Login\Domain\ValueObjects;

use Src\Shared\Domain\ValueObjects\StringValueObject;

final class LoginJwt extends StringValueObject
{
    public function jwtKey(): string
    {
        return env('JWT_KEY');
    }

    public function jwtEncrypt(): array
    {
        return [env('JWT_ENCRYPT')];
    }
}