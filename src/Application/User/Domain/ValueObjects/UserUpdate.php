<?php

namespace Src\Application\User\Domain\ValueObjects;

use Src\Shared\Domain\ValueObjects\MixedValueObject;

final class UserUpdate extends MixedValueObject
{
    private array $handler;

    public function __construct(mixed $value)
    {
        parent::__construct($value);
        $this->handler = $value;
        $this->password();
    }

    private function password(): void
    {
        $this->handler['password'] = password_hash($this->handler['password'], PASSWORD_DEFAULT);
    }

    public function handler(): array
    {
        return $this->handler;
    }
}