<?php
namespace App\Service;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class MailerService {
    public function __construct(private readonly MailerInterface $mailer) {}

    public function send(
        string $to,
        string $subject,
        string $templateTwig,
        array $context = []
    ): void {
        $email = (new TemplatedEmail())
            ->from(addresses: new Address('noreply@sitedev.en', 'SiteDev'))
            ->to($to)
            ->subject($subject)
            ->htmlTemplate(template: "emails/$templateTwig")
            ->context($context);

        try{
            $this->mailer->send($email);
        } catch (TransportExceptionInterface $e) { // If an error occurs while sending the email
            throw new \Exception('An error occurred while sending the email: ' . $e->getMessage());
        }
    }
}