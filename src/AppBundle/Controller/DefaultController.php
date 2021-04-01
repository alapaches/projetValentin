<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Produit;
use AppBundle\Entity\Categorie;
use AppBundle\Service\Panier\PanierService;
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
    public function indexAction(Request $request, PanierService $panierService)
    {
        
        $categories = $this->getDoctrine()->getManager()->getRepository(Categorie::class)->findAll();

        $filter = $request->get("filter");

        if($filter === null) {
            $produits = $this->getDoctrine()->getManager()->getRepository(Produit::class)->findAll();    
        } else {
            $catFilter = $this->getDoctrine()->getManager()->getRepository(Categorie::class)->findBy(array("nom" => $filter));
            $produits = $this->getDoctrine()->getManager()->getRepository(Produit::class)->findByCategorie($catFilter[0]->getId());
        }

        $panier = $panierService->getPanier();
        $longueur = count($panier);
        
        
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
