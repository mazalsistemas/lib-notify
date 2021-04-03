<?php

namespace Notification;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use stdClass;


class Email{

    private $mail = stdClass::class;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);

        //Server settings
        $this->mail->SMTPDebug = 1;                      //Enable verbose debug output
        $this->mail->isSMTP();                                            //Send using SMTP
        $this->mail->Host       = '';                     //Set the SMTP server to send through
        $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $this->mail->Username   = '';                     //SMTP username
        $this->mail->Password   = '';                               //SMTP password
        $this->mail->SMTPSecure = 'ssl';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $this->mail->Port       = 465;
        $this->mail->setLanguage('br');
        $this->mail->isHTML(true);
        $this->mail->setFrom('','Dev Team');
    }

    public function sendEmail($subject,$body,$replyEmail,$replayName,$addressEmail,$addressName)
    {
        $this->mail->Subject = (string)$subject;
        $this->mail->Body = $body;

        $this->mail->addReplyTo($replyEmail,$replayName);
        $this->mail->addAddress($addressEmail,$addressName);

        try{
            $this->mail->send();
        }catch (Exception $e){
            echo $e->errorMessage();
        }
    }
}