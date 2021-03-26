<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Produit;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $produits = $this->getDoctrine()->getManager()->getRepository(Produit::class)->findAll();
        
        return $this->render('default/index.html.twig', [
            'produits' => $produits
        ]);
    }
}
