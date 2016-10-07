<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * GetUser controller.
 *
 */
class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        $user = $this->getUser();

        if ($user instanceof UserInterface) {
            return $this->redirectToRoute('homepage');
        }

        /** @var AuthenticationException $exception */
        $exception = $this->get('security.authentication_utils')
            ->getLastAuthenticationError();

        return $this->render('security/login.html.twig', [
            'error' => $exception ? $exception->getMessage() : NULL,
        ]);
    }

}