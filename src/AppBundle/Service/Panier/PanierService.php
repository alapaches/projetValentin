<?php

namespace AppBundle\Service\Panier;

use AppBundle\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class PanierService {

    protected $session;

    protected $produitsRepository;

    public function __construct(SessionInterface $session, ProduitRepository $produitsRepository) {
        $this->session = $session;
        $this->produitsRepository = $produitsRepository;
    }

    public function getPanier(): array {
        $panier = $this->session->get('panier', []);

        return $panier;
    }

    public function deletePanier() {
        $this->session->remove("panier");
    }

    public function add($id) {
        $panier = $this->session->get('panier', []);

        if(!empty($panier[$id])) {
            $panier[$id] ++;
        } else {
            $panier[$id] = 1;
        }

        $this->session->set('panier', $panier);
    }

    public function delete($id) {
        $panier = $this->session->get('panier', []);

        if(!empty($panier[$id])) {
            unset($panier[$id]);
        }

        $this->session->set('panier', $panier);
    }

    public function getDonneesPanier() : array {

        $panier = $this->session->get('panier', []);
        $donneesPanier = [];

        foreach($panier as $id => $quantite) {
            $donneesPanier[] = [
                'article' => $this->produitsRepository->find($id),
                'quantite' => $quantite
            ];
        }

        return $donneesPanier;
        
    }

    public function getTotal() : float {

        $total = 0;
        $donnees = $this->getDonneesPanier();
        foreach($donnees as $article) {
            $totalArticle = $article['article']->getPrix() * $article['quantite'];
            $total += $totalArticle;
        }

        return $total;
    }
}