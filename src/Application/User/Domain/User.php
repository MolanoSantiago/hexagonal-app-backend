<?php

namespace Src\Application\User\Domain;

use Src\Application\User\Domain\Exceptions\UserException;
use Src\Shared\Domain\Domain;
use Src\Shared\Domain\Helper\HttpCodesDomainHelper;

final class User extends Domain
{
    USE HttpCodesDomainHelper;

    private const USER_NOT_FOUND = 'USER_NOT_FOUND';
    private const FAILED_STORE = 'FAILED_STORE';
    private const FAILED_UPDATE = 'FAILED_UPDATE';

    protected function isException(?string $exception): void
    {
        if (!is_null($exception)) {
            match ($exception) {
                self::USER_NOT_FOUND => throw new UserException("User not found", $this->notFound()),
                self::FAILED_STORE => throw new UserException("Failed to save user", $this->internalError()),
                self::FAILED_UPDATE => throw new UserException("Failed to update user", $this->internalError())
            };
        }
    }
}