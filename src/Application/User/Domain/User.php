<?php

namespace Src\Application\User\Domain;

use Src\Application\User\Domain\Exceptions\UserException;
use Src\Shared\Domain\Domain;
use Src\Shared\Domain\Helper\HttpCodesDomainHelper;

final class User extends Domain
{
    USE HttpCodesDomainHelper;

    private const USER_NOT_FOUND = 'USER_NOT_FOUND';

    protected function isException(?string $exception): void
    {
        if (!is_null($exception)) {
            match ($exception) {
                self::USER_NOT_FOUND => throw new UserException("User not exists", $this->notFound())
            };
        }
    }
}