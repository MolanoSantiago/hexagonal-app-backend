<?php

namespace Src\Shared\Domain\ValueObjects;

abstract class MixedValueObject
{
    /**
     * @param mixed $value
     */
    public function __construct(private mixed $value)
    {

    }

    /**
     * @return mixed
     */
    public function value(): mixed
    {
        return $this->value;
    }
}
