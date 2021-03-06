<?php

namespace App\Mails;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

abstract class Mail
{
    protected PHPMailer $mail;
    protected ?string $subject = '';
    protected string $message;
    protected string $to = 'contact@myblog.fr';
    protected string $from;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->mail->setLanguage('fr');
    }

    public function sendMail()
    {
            //Server settings
            $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $this->mail->isSMTP();                                            //Send using SMTP
            $this->mail->Host =$_ENV['MAIL_HOST'];                     //Set the SMTP server to send through
            $this->mail->Port = $_ENV['MAIL_PORT'];               //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Charset
            $this->mail->CharSet = "utf-8";

            // Expediteur
            $this->mail->setFrom($this->from);

            // Destinataire
            $this->mail->addAddress($this->to);               //Name is optional

            //Content
            $this->mail->isHTML(true);                                  //Set email format to HTML
            $this->mail->Subject = $this->subject;
            $this->mail->Body    = $this->message;
            $this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        try {
            $this->mail->send();
        }catch (Exception $exception)
        {
            if($_ENV['ENV'] === 'dev'){
            echo "$exception Erreur: {$this->mail->ErrorInfo}";
        }
            else if($_ENV['ENV'] === 'prod')
            {
                throw new MailException("Le message n'a pas pu etre envoyé.");
            }
        };
    }

    /**
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }

    /**
     * @param string|null $subject
     */
    public function setSubject(?string $subject): void
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getTo(): string
    {
        return $this->to;
    }

    /**
     * @param string $to
     */
    public function setTo(string $to): void
    {
        $this->to = $to;
    }

    /**
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * @param string $from
     */
    public function setFrom(string $from): void
    {
        $this->from = $from;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @param string $host
     */
    public function setHost(string $host): void
    {
        $this->host = $host;
    }


}