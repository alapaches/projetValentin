<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Categorie;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadCategorieData implements FixtureInterface, ContainerAwareInterface {

    private $container;

    public function setContainer(ContainerInterface $container = null) {
		$this->container = $container;
	}

    /**
	 * Load data fixtures with the passed EntityManager
	 *
	 * @param ObjectManager $manager 
	 *
	 * @return mixed
	 */
    public function load(ObjectManager $manager) {

        $categories = ["Figurines Pop", "Mangas", "Posters", "Vinyles"];
        foreach($categories as $cat) {
            $categorie = new Categorie();
            $categorie->setNom($cat);
            $manager->persist($categorie);
        }

        $manager->flush();
    }
}