<?php

namespace Notification;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email
{
    private $email = \stdClass::class;

    public function __construct($smtpDebug, $host, $user, $pass, $smtpSecure, $port, $setFronEmail, $setDromName)
    {

        $this->mail =new PHPMailer(true);

        $this->mail->SMTPDebug = $smtpDebug;                                //Enable verbose debug output
        $this->mail->isSMTP();                                              //Send using SMTP
        $this->mail->Host       = $host;                                    //Set the SMTP server to send through
        $this->mail->SMTPAuth   = true;                                     //Enable SMTP authentication
        $this->mail->Username   = $user;                                    //SMTP username
        $this->mail->Password   = $pass;                                    //SMTP password
        $this->mail->SMTPSecure = $smtpSecure;                              //Enable implicit TLS encryption
        $this->mail->Port       = $port;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $this->mail->CharSet = 'utf8';
        $this->mail->isHTML( true);
        $this->mail->setFrom($setFronEmail, $setDromName );

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