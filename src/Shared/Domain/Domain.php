<?php

namespace Src\Shared\Domain;

abstract class Domain
{
    /**
     * @param mixed $entity
     * @param string $exception
     */
    public function __construct(private mixed $entity = null, private readonly ?string $exception = null)
    {
        $this->isException($this->exception);
    }

    /**
     * @return mixed
     */
    public function entity() : mixed
    {
        return $this->entity;
    }

    /**
     * @param string|null $exception
     * @return void
     */
    protected abstract function isException(?string $exception): void;
}
