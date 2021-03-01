<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Message extends Mailable{   

    use Queueable, SerializesModels;

    public $subject = "Fechas para la Realizacion de la NOM:035";
    public $fechas,$periodo;
    
    public function __construct($fechas,$periodo){
        $this->fechas=$fechas;
        $this->periodo=$periodo;
        $this->subject=$this->subject." ".$periodo;
    }

    public function build(){
        return $this->view('cuestionario.email.notificaion-asignacion');
    }
}


//ItsxTestLaboral@g
//ItsxTestLaboral1234
//ItsxTestLaboraal@g
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