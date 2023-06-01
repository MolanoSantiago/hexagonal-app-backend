<?php

namespace Src\Management\Forgot\Infrastructure\Repositories\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

final class CustomMail extends Mailable
{
    use Queueable, SerializesModels;

    public $demo;
    public $data;

    public function __construct($demo, $data)
    {
        $this->demo = $demo;
        $this->data = $data;
    }

    public function build()
    {
        return $this->from($this->demo->from)
            ->subject($this->demo->subject)
            ->markdown($this->demo->markdown)
                ->with('username', $this->data['username'])
                ->with('tempPassword', $this->data['tempPassword']);
    }
}