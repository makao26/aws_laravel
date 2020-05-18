<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     protected $title;
     protected $name;
     protected $text;

    public function __construct($title,$name,$text)
    {
      $this->title = $title;
      $this->name = $name;
      $this->text = $text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $data = [
        'user' => $this->user,
        'text' => $this->text,
      ];
      return $this->view('admin.contact.contact_mail')
                ->from('makao26work@gmail.com')
                ->subject($this->title)
                ->with($data);
    }
}
