<?php

namespace Src\Management\Login\Domain\ValueObjects;

use Src\Shared\Domain\ValueObjects\MixedValueObject;

final class LoginAuth extends MixedValueObject
{
    public function checkPassword(string $passwordRequest, string $password): bool
    {
        return password_verify($passwordRequest, $password);
    }
}
