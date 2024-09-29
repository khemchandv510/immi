<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
  protected $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data = [])
    {
        //
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    Log::info("it's mail model");

    return $this->from('rajeevtu2@gmail.com')->subject("Regarding Your Query")->view('enquiry.dynamic_mail_template')->with('data','$this->data');
    {
        // return $this->view('view.name');
    }
}
