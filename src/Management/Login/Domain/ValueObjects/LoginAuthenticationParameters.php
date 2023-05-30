<?php

namespace Src\Management\Login\Domain\ValueObjects;

use Src\Shared\Domain\ValueObjects\MixedValueObject;

final class LoginAuthenticationParameters extends MixedValueObject
{
    public function handler(): array
    {
        return [
            'iat' => time(),
            'exp' => $this->getTime(),
            'aud' => $this->aud(),
            'data' => $this->value()
        ];
    }

    private function getTime(): float|int
    {
        $time = time();

        return $time + (60*60);
    }

    private function aud(): ?string
    {
        $aud = '';

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $aud = $_SERVER['HTTP_CLIENT_IP'];
        }

        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $aud = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }

        if ($_SERVER['REMOTE_ADDR']) {
            $aud = $_SERVER['REMOTE_ADDR'];
        }

        $aud .= @$_SERVER['HTTP_USER_AGENT'];
        $aud .= gethostname();

        return sha1($aud ?? null);
    }

    public function jwtKey(): string
    {
        return env('JWT_KEY');
    }

    public function jwtEncrypt(): string
    {
        return env('JWT_ENCRYPT');
    }
}
