<?php

namespace Src\Shared\Domain\Helper;

trait HttpCodesDomainHelper
{
    public function ok(): int
    {
        return 200;
    }

    public function created(): int
    {
        return 201;
    }

    public function updated(): int
    {
        return 202;
    }

    public function badRequest(): int
    {
        return 400;
    }

    public function unauthorized(): int
    {
        return 401;
    }

    public function internalError(): int
    {
        return 500;
    }

    public function notFound(): int
    {
        return 404;
    }
}