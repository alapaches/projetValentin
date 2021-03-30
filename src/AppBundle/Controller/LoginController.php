<?php

namespace AppBundle\Controller;

use AppBundle\Service\Panier\PanierService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request, AuthenticationUtils $authenticationUtils, PanierService $panierService)
    {
        $longueur = count($panierService->getPanier());        
        $this->get('twig')->addGlobal('panierLongueur', $longueur);
        $errors = $authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();


        return $this->render('@App/Login/login.html.twig', array(
            'errors' => $errors,
            'username' => $lastUsername
        ));
    }

// /**
//      * @Route("/logout", name="logout")
//      */
//     public function logoutAction(Request $request, AuthenticationUtils $authenticationUtils, PanierService $panierService)
//     {
//         $longueur = count($panierService->getPanier());        
//         $this->get('twig')->addGlobal('panierLongueur', $longueur);
//         $errors = $authenticationUtils->getLastAuthenticationError();

//         $lastUsername = $authenticationUtils->getLastUsername();


//         return $this->render('@App/Login/login.html.twig', array(
//             'errors' => $errors,
//             'username' => $lastUsername
//         ));
//     }
}
