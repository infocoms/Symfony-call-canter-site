<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if($this->isGranted('ROLE_MANAGER'))
        {
            return $this->redirectToRoute('user_index');
        }

        if($this->isGranted('ROLE_CUSTOMER'))
        {
            return $this->redirectToRoute('main');
        }

        if($this->isGranted('ROLE_FIRSTLINE'))
        {
            return $this->redirectToRoute('app_question');
        }

        if($this->isGranted('ROLE_SECONDLINE'))
        {
            return $this->redirectToRoute('user_index');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }
}
