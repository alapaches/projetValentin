<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Produit;
use AppBundle\Entity\Categorie;
use AppBundle\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class DefaultController extends Controller
{

    private $repo;

    public function __construct(CategorieRepository $repo) {
        $this->repo = $repo;
    }
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(SessionInterface $session)
    {
        $produits = $this->getDoctrine()->getManager()->getRepository(Produit::class)->findAll();

        $categories = $this->getDoctrine()->getManager()->getRepository(Categorie::class)->findAll();

        $longueur = count($session->get('panier', []));
        
        
        $this->get('twig')->addGlobal('panierLongueur', $longueur);
        return $this->render('default/index.html.twig', [
            'produits' => $produits,
            'categories' => $categories
        ]);
    }

    /**
     * @Route("/filter-articles", name="homepage_filter")
     * @Method({"GET"})
     */
    public function filterAction(Request $request) {
        $filterId = $request->get('filter');

        dump($filterId);
        die();
    }
}
