<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class notification_inscription extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     * 
     * public $nom;
    public $email;
    public $mdp;
     */
    
    
    public function __construct()
    {
        //
       /* $this->nom = $nom;
        $this->email = $email;
        $this->mdp = $mdp;*/
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       
        return $this->subject('Bienvenus ') // ceci sera le sujet de l'e-mail
                    ->view('mails.natification_inscription');
    }
}
