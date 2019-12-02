<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class approveDriver extends Mailable
{
    use Queueable, SerializesModels;

    public $demo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($demo)
    {
        $this->demo = $demo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->from('vero1@techopialabs.com')
                 ->view('mails.demo')
                 ->text('mails.demo_plain')
                 ->with(
                   [
                         'testVarOne' => '1',
                         'testVarTwo' => '2',
                   ]);
    }
}
