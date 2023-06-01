<?php

namespace Src\Management\Forgot\Domain;

use Src\Management\Forgot\Domain\Exceptions\ForgotPasswordException;
use Src\Shared\Domain\Domain;
use Src\Shared\Domain\Helper\HttpCodesDomainHelper;
use Src\Management\Login\Infrastructure\Repositories\Eloquent\User;
use Illuminate\Support\Str;

final class Forgot extends Domain
{
    use HttpCodesDomainHelper;

    private const MAIL_FAILED = 'MAIL_FAILED';
    private const MAIL_NOT_FOUND = 'MAIL_NOT_FOUND';

    public function isException(?string $exception): void
    {
        if (!is_null($exception)) {
            match ($exception) {
                self::MAIL_FAILED => throw new ForgotPasswordException("Email send failed", $this->internalError()),
                self::MAIL_NOT_FOUND => throw new ForgotPasswordException("Email not found", $this->notFound())
            };
        }
    }

    private function temporalPassword(): string
    {
        $length = 6;
        $bytes = random_bytes($length);
        $password = rtrim(strtr(base64_encode($bytes), '+/', '-_'), '=');

        return $password;
    }

    private function isEmailCheck(string $emailToCheck)
    {
        $user = User::where('email', $emailToCheck)->first();
        
        if(!$user) {
            return null;
        }
        $tempPassword = $this->temporalPassword();
        $user->password = password_hash($tempPassword, PASSWORD_DEFAULT);
        $user->save();

        $username = Str::of($user->name)->explode(' ')->first();

        return [
            'username' => $username,
            'tempPassword' => $tempPassword
        ];
    }

    public function getCheckEmail(string $email)
    {
        return $this->isEmailCheck($email);
    }
}
