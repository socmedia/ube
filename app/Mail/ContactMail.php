<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $request;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->request = (object) $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'), '[NO-REPLY] - ' . config('mail.from.name'))
            ->subject('Halo tim ! Ada email baru dari contact form website kita nih !')
            ->with([
                'request' => $this->request,
            ])
            ->markdown('mail.contact-mail');
    }
}