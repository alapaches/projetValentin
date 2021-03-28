<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Produit;
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
    public function indexAction(SessionInterface $session) {
        $longueur = count($session->get('panier', []));
        
        $this->get('twig')->addGlobal('panierLongueur', $longueur);
        $panier = $session->get('panier', []);
        $produitRepository = $this->getDoctrine()->getManager()->getRepository(Produit::class);
        $donneesPanier = [];

        foreach($panier as $id => $quantite) {
            $donneesPanier[] = [
                'article' => $produitRepository->find($id),
                'quantite' => $quantite
            ];
        }

        $total = 0;

        foreach($donneesPanier as $article) {
            $totalArticle = $article['article']->getPrix() * $article['quantite'];
            $total += $totalArticle;
        }

        return $this->render('@App\Panier\index.html.twig', array(
            'produits' => $donneesPanier,
            'totalPanier' => $total
        ));
    }

    /**
     * @Route("/add/{id}", name="panier_add")
     */
    public function addAction($id, SessionInterface $session) {
        
        $panier = $session->get('panier', []);

        if(!empty($panier[$id])) {
            $panier[$id] ++;
        } else {
            $panier[$id] = 1;
        }

        $session->set('panier', $panier);

        return $this->redirectToRoute("panier_index");
    }

    /**
     * @Route("/delete/{id}", name="panier_delete")
     */
    public function deleteAction($id, SessionInterface $session) {
        $panier = $session->get('panier', []);

        if(!empty($panier[$id])) {
            unset($panier[$id]);
        }

        $session->set('panier', $panier);

        return $this->redirectToRoute("panier_index");
    }
}
