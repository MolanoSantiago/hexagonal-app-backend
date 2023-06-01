<?php

namespace Src\Management\Forgot\Infrastructure\Repositories\Mail;

use Illuminate\Support\Facades\Mail;
use Src\Management\Forgot\Domain\Contracts\ForgotMailableContract;
use Src\Management\Forgot\Domain\ValueObjects\ForgotMailable as ValueObjectsForgotMailable;
use Src\Management\Forgot\Domain\Forgot;

final class ForgotMailable implements ForgotMailableContract
{
    private Mail $mail;
    private Forgot $forgot;

    public function __construct(Forgot $forgot)
    {
        $this->forgot = $forgot;
        $this->mail = new Mail();
    }

    public function sendMail(ValueObjectsForgotMailable $forgotMailable): Forgot
    {
        $mailData = $this->forgot->getCheckEmail($forgotMailable->value());
        if (!$mailData) {
            return new Forgot(null, 'MAIL_NOT_FOUND');
        }

        $response = $this->mail::to($forgotMailable->value())
            ->send(new CustomMail($forgotMailable->getMailObject(), $mailData));

        if (!$response) {
            return new Forgot(null, 'MAIL_FAILED');
        }

        return new Forgot([
            'email' => $forgotMailable->value(),
            'status' => 'Email send'
        ]);
    }
}
