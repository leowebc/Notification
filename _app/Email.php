<?php

namespace Notification;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email
{
    private $email = \stdClass::class;

    public function __construct()
    {
        $this->mail =new PHPMailer(true);

        $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $this->mail->isSMTP();                                            //Send using SMTP
        $this->mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
        $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $this->mail->Username   = 'user@example.com';                     //SMTP username
        $this->mail->Password   = 'secret';                               //SMTP password
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $this->mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $this->mail->CharSet = 'utf8';
        $this->mail->isHTML( true);
        $this->mail->setFrom('gustavo@gustavoweb.me', 'Equipe Gustavoweb' );

    }

    public function sendMail()
    {
        try {
            $this->mail->send();
        } catch (Exception $e){
            echo "Erro ao enviar o e-mail: {$this->mail->ErrorInfo} {$e->getMessage()}";
        }

    }
}