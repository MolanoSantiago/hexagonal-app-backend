<?php

namespace Src\Shared\Domain\ValueObjects;

abstract class StringValueObject
{
    /**
     * @param string $value
     */
    public function __construct(private string $value)
    {

    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->value;
    }
}
