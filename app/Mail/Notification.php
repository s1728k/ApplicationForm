<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Notification extends Mailable
{
    use Queueable, SerializesModels;

    protected $form_name;
    protected $id;
    protected $pin;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($form_name, $id, $pin)
    {
        $this->form_name = $form_name;
        $this->id = $id;
        $this->pin = $pin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // $urlpath = '/'.$this->rtype.'/'.$this->user->id.'?hash="'.$this->user->email_varification.'"';
        // return $this->view('c.email-verification-mail')->with(['rtype' => $this->rtype, 'urlpath' => $urlpath]);
        return $this->view('notification')->with(['form_name' => $this->form_name, 'id' => $this->id, 'pin' => $this->pin]);
    }
}
