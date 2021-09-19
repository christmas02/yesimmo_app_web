<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class alert_reservation extends Mailable
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
    public $data;
    
    
    public function __construct($data)
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
    {
       
        return $this->from('infos@yesimmo.ci', 'Alert reservation')
                    ->subject('Alert reservation')
                    ->markdown('mails.alert_agent');
    }
}
