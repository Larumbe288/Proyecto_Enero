<?php

namespace Mailer;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'repositories/vendor/autoload.php';

class Mailer
{
    public string $remitente;
    public string $destinatario;
    public string $destinatarioCC;
    public string $path;
    public string $text;


    public function __construct($remitente, $destinatario, $destinatarioCC = '', $path = '',$text)
    {
        $this->remitente = $remitente;
        $this->destinatario = $destinatario;
        $this->destinatarioCC = $destinatarioCC;
        $this->path = $path;
        $this->text = $text;
    }


    public function enviarEmail()
    {
        if ($this->destinatarioCC != '' && $this->path != '') {
            $mail = $this->auxEmail();
            try {
                $mail->addCC($this->destinatarioCC);
                $mail->addAttachment($this->path);
                $mail->send();
                echo 'Message has been sent';
            } catch (\Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else if ($this->destinatarioCC == '' && $this->path != '') {
            $mail = $this->auxEmail();
            try {
                $mail->addAttachment($this->path);
                $mail->send();
                echo 'Message has been sent';
            } catch (\Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else if ($this->destinatarioCC == '' && $this->path == '') {
            $mail = $this->auxEmail();
            try {
                $mail->send();
                echo 'Message has been sent';
            } catch (\Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else if ($this->destinatarioCC != '' && $this->path == '') {
            $mail = $this->auxEmail();
            try {
                $mail->addCC($this->destinatarioCC);
                $mail->send();
                echo 'Message has been sent';
            } catch (\Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }

    public function auxEmail()
    {
        $mail = new PHPMailer(true);
        try {
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'alvarolarumbe97@gmail.com';
            $mail->Password = 'uukerzfiypsuguso';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->setFrom($this->remitente, 'Mailer');
            $mail->addAddress($this->destinatario, 'Joe User');
            $mail->isHTML(true);
            $mail->Subject = 'Contact Form';
            $mail->Body = $this->text;
        } catch (\Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        return $mail;
    }
}
