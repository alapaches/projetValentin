<?php

namespace AppBundle\Controller;

use AppBundle\Service\Panier\PanierService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


/**
 * Commande Controller
 * @Route("/commande")
 */
class CommandeController extends Controller
{
    /**
     * @Route("/", name="panier_commande")
     */
    public function indexAction(PanierService $panierService)
    {
        $longueur = count($panierService->getPanier());        
        $this->get('twig')->addGlobal('panierLongueur', $longueur);

        return $this->render('@App\Commande\index.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/delete", name="delete_panier")
     */
    public function deletePanierAction(Request $request, PanierService $panierService) {
        $panierService->deletePanier();
        
        return $this->redirectToRoute("homepage");
    }
}
