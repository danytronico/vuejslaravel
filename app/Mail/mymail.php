<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class mymail extends Mailable
{
    use Queueable, SerializesModels;

      public $nombre;
      public $comentario;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre,$comentario)
    {
        $this->nombre = $nombre;
        $this->comentario = $comentario;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('ejemplo@prueba.com')->
        $this->view('emails.myemail')->with();
    }
}
