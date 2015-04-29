<?php
/**
 * Created by PhpStorm.
 * set email by port 465 and ssl
 */
namespace Jfpal\AppBundle\Email;
use Symfony\Component\DependencyInjection\Container;

class Email{

    private $container;
    private $emailHost;
    private $username;
    private $password;

    public function __construct(Container $container) {
        $this->container = $container;
        $this->emailHost = $this->container->getParameter("mailer_host");
        $this->username  = $this->container->getParameter("mailer_user");
        $this->password  = $this->container->getParameter("mailer_password");
    }

    public function setEmail($subject, $email, $message){
        $transport = \Swift_SmtpTransport::newInstance($this->emailHost, 465, 'ssl')->setUsername($this->username)->setPassword($this->password);
        $mail = \Swift_Mailer::newInstance($transport);
        $message = \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom($this->username)
            ->setTo($email)
            ->setBody($message);
        return $mail->send($message);
    }

}