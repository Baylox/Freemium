<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Service\MailerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;

class RegistrationController extends AbstractController
{
    #[Route('/inscription', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, 
    EntityManagerInterface $entityManager,
    MailerService $mailerService,
    TokenGeneratorInterface $tokenGeneratorInterface): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // Generate a token
            $tokenRegistration = $tokenGeneratorInterface->generateToken();
            
            // User
            $user->setPassword($userPasswordHasher->hashPassword($user, $form->get('plainPassword')->getData())); // encode the password

            // User token 
            $user->setTokenRegistration(tokenRegistration: $tokenRegistration);


            $entityManager->persist($user); // prepare to save
            $entityManager->flush(); // save

            // Send an email to the user
            $mailerService->send(
                to: $user->getEmail(),
                subject: 'Activate your account',
                templateTwig: 'registration/activation_email.html.twig',
                context: [
                    'user' => $user,
                    'token' => $tokenRegistration,
                    'lifeTimeToken' => $user->getTokenRegistrationLifeTime()->format('d-m-Y-H-i-s')
                ]
            );

            $this->addFlash('success', 'Your account has been successfully created! Please check your email to activate your account!');

            return $this->redirectToRoute('app_login');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    #[Route('/verify', name: 'account-verify')]
    public function verify( string $token, User $user){
        dd($token);
    }
}
