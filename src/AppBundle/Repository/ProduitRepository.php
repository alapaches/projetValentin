<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Produit;
use AppBundle\Entity\Categorie;

/**
 * ProduitRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProduitRepository extends \Doctrine\ORM\EntityRepository
{

    public function findByCategorie($categorie) {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM AppBundle:Produit p WHERE p.categorie = '.$categorie.''
            )
            ->getResult();
    }
}
