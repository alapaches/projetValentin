<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Produit;
use AppBundle\Service\Panier\PanierService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Panier controller.
 *
 * @Route("panier")
 */
class PanierController extends Controller
{
    /**
     * @Route("/", name="panier_index")
     */
    public function indexAction(PanierService $panierService) {
        $longueur = count($panierService->getPanier());        
        $this->get('twig')->addGlobal('panierLongueur', $longueur);

        return $this->render('@App\Panier\index.html.twig', array(
            'produits' => $panierService->getDonneesPanier(),
            'totalPanier' => $panierService->getTotal()
        ));
    }

    /**
     * @Route("/add/{id}", name="panier_add")
     */
    public function addAction($id, PanierService $panierService) {
        
        $panierService->add($id);

        return $this->redirectToRoute("panier_index");
    }

    /**
     * @Route("/delete/{id}", name="panier_delete")
     */
    public function deleteAction($id, PanierService $panierService) {
        $panierService->delete($id);

        return $this->redirectToRoute("panier_index");
    }
}
