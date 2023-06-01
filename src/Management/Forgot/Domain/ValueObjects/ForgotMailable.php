<?php

namespace Src\Management\Forgot\Domain\ValueObjects;

use Src\Shared\Domain\ValueObjects\StringValueObject;
use stdClass;

final class ForgotMailable extends StringValueObject
{
    private stdClass $mailObject;

    public function __construct(string $value)
    {
        parent::__construct($value);
        $this->mailObject = new stdClass();
        $this->setFrom();
        $this->setSubject();
        $this->setMarkdown();
    }

    public function getMailObject(): stdClass
    {
        return $this->mailObject;
    }

    private function setFrom(): void
    {
        $this->mailObject->from = 'app.arch.hex@gmail.com';
    }

    private function setSubject(): void
    {
        $this->mailObject->subject = 'Reset your password';
    }

    private function setMarkdown(): void
    {
        $this->mailObject->markdown = 'mails.Forgot';
    }
}