<?php

namespace App\Controller;

use App\Form\LoginFormType;
use App\Form\RegistrationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $form = $this->createForm(LoginFormType::class);

        $form->get('_username')->setData($authenticationUtils->getLastUsername());

        if ($error = $authenticationUtils->getLastAuthenticationError()) {
            $form->addError(new FormError($error->getMessageKey()));
        }

        return $this->render('security/login.html.twig', [
            'loginForm' => $form,
        ]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
