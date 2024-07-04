<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendEmailAfterRegist extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public $pass;
    public $name;
    /**
     * Create a new message instance.
     */
    public function __construct($data,$pass,$name)
    {
        $this->data = $data;
        $this->pass = $pass;
        $this->name = $name;
    }

    public function build()
    {
        return $this->subject('Credential Login SSSKIN')
                    ->view('pages-fe.template-email-after-regist')->with([
                        'email' => $this->data,
                        'pass' => $this->pass,
                        'name' => $this->name
                    ]);
    }
}
