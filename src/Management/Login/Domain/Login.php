<?php

namespace Src\Management\Login\Domain;

use Src\Management\Login\Domain\Exceptions\NotLoginException;
use Src\Shared\Domain\Domain;
use Src\Shared\Domain\Helper\HttpCodesDomainHelper;

final class Login extends Domain
{
    use HttpCodesDomainHelper;

    private const EMAIL_OR_PASSWORD_INCORRECT = 'EMAIL_OR_PASSWORD_INCORRECT';
    private const DEFAULT__ID_ROLE = 2;
    private const DEFAULT__NAME_ROLE = 'common';
    private const ALL_ROLES_ALLOWED = '*';

    private bool $checkRole;

    public function __construct(private mixed $entity = null, private ?string $exception = null)
    {
        parent::__construct($this->entity, $this->exception);
        $this->checkRole = $this->isUserCheckRole();
    }

    public function handler(): array
    {
        return [
            'id' => $this->entity()['id'],
            'name' => $this->entity()['name'],
            'email' => $this->entity()['email'],
            'roles' => [
                'id' => $this->entity()['roles'][0]['id'] ?? self::DEFAULT__ID_ROLE,
                'name' => $this->entity()['roles'][0]['name'] ?? self::DEFAULT__NAME_ROLE,
            ]
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

    private function isUserCheckRole(): bool
    {
        if (!array_key_exists('user', $this->entity()) && !array_key_exists('typeRoles', $this->entity())) {
            return true;
        }

        if (is_array($this->entity()['typeRoles'])) {
            if (!in_array($this->entity()['user']->roles->name, $this->entity()['typeRoles'])) {
                return false;
            }

            return true;
        }

        if (self::ALL_ROLES_ALLOWED === $this->entity()['typeRoles']) {
            return true;
        }

        if ($this->entity()['user']->roles->name !== $this->entity()['typeRoles']) {
            return false;
        }

        return true;
    }

    public function getCheckRole(): bool
    {
        return $this->checkRole;
    }
}
