<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageCambioCorreo extends Mailable{   

    use Queueable, SerializesModels;

    public $subject = "Cambio de correo -NOM:035";
    public $id;
    public $emailAntiguo;
    
    public function __construct($id,$emailAntiguo){
        $this->id=$id;
        $this->emailAntiguo=$emailAntiguo;
    }

    public function build(){
        return $this->view('users.email.notificaion-correo');
    }
}


//ItsxTestLaboral@g
//ItsxTestLaboral1234

//respaldp 
/*
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=ItsxTestLaboral
MAIL_PASSWORD=ItsxTestLaboral1234
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=alucard@gamil.com
MAIL_FROM_NAME="${APP_NAME}"
*/