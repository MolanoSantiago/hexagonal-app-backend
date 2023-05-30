<?php

namespace Src\Management\Login\Domain;

use Src\Management\Login\Domain\Exceptions\NotLoginException;
use Src\Shared\Domain\Domain;
use Src\Shared\Domain\Helper\HttpCodesDomainHelper;

final class Login extends Domain
{
    use HttpCodesDomainHelper;

    private const EMAIL_OR_PASSWORD_INCORRECT = 'EMAIL_OR_PASSWORD_INCORRECT';

    public function handler(): array
    {
        return [
            'id' => $this->entity()['id'],
            'name' => $this->entity()['name'],
            'email' => $this->entity()['email']
        ];
    }

    protected function isException(?string $exception): void
    {
        if (!is_null($exception)) {
            match ($exception) {
                self::EMAIL_OR_PASSWORD_INCORRECT => throw new NotLoginException("Email or password incorrect", $this->badRequest())
            };
        }
    }
}
