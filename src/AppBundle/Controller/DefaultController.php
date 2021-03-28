<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Produit;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(SessionInterface $session)
    {
        $produits = $this->getDoctrine()->getManager()->getRepository(Produit::class)->findAll();

        $longueur = count($session->get('panier', []));
        
        $this->get('twig')->addGlobal('panierLongueur', $longueur);
        return $this->render('default/index.html.twig', [
            'produits' => $produits
        ]);
    }
}
