<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Produit;

use AppBundle\Repository\CategorieRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;

class LoadProduitData implements FixtureInterface, ContainerAwareInterface {

    private $container;

    private $categorieRepo;

    public function setContainer(ContainerInterface $container = null) {
		$this->container = $container;
	}

    public function __construct(CategorieRepository $categorieRepo) {
        $this->categorieRepo = $categorieRepo;
    }

    /**
	 * Load data fixtures with the passed EntityManager
	 *
	 * @param ObjectManager $manager 
	 *
	 * @return mixed
	 */
    public function load(ObjectManager $manager) {

        $figurinesCat = $this->categorieRepo->findBy(array("nom" => "Figurines Pop"));
        $mangasCat = $this->categorieRepo->findBy(array("nom" => "Mangas"));
        $posterCat = $this->categorieRepo->findBy(array("nom" => "Posters"));
        $vinyleCat = $this->categorieRepo->findBy(array("nom" => "Vinyles"));
        
        $figurines =  [
            0 => [
                "nom" => "Geralt de Riv",
                "description" => "Le Sorceleur, le boucher de Blaviken",
                "prix" => 49.99,
                "categorie" => $figurinesCat,
                "image" => "figurines/geralt.png"
            ],
            1 => [
                "nom" => "Lala",
                "description" => "Le telletubies jaune",
                "prix" => 19.99,
                "categorie" => $figurinesCat,
                "image" => "figurines/lala.png"
            ],
            2 => [
                "nom" => "Mercy",
                "description" => "Les heros ne meurent jamais",
                "prix" => 59.99,
                "categorie" => $figurinesCat,
                "image" => "figurines/mercy.png"
            ],
            3 => [
                "nom" => "John Snow",
                "description" => "Le hero principal de Game of Thrones",
                "prix" => 34.99,
                "categorie" => $figurinesCat,
                "image" => "figurines/snow.png"
            ],
            4 => [
                "nom" => "Marty McFly",
                "description" => "Le lycéen qui n'a pas le 'temps'",
                "prix" => 69.99,
                "categorie" => $figurinesCat,
                "image" => "figurines/marty.png"
            ],
            5 => [
                "nom" => "Groot",
                "description" => "le symbole mignon des gardiens de la galaxie",
                "prix" => 49.99,
                "categorie" => $figurinesCat,
                "image" => "figurines/groot.png"
            ]
        ];

        $mangas = [
            0 => [
                "nom" => "Dragon Ball Z",
                "description" => "Suivez les aventures des sayans",
                "prix" => 49.99,
                "categorie" => $mangasCat,
                "image" => "mangas/dbz.png"
            ],
            1 => [
                "nom" => "Bleach",
                "description" => "Le jour ou Ichigo Kurosaki est devenu Shinigami",
                "prix" => 49.99,
                "categorie" => $mangasCat,
                "image" => "mangas/bleach.png"
            ],
            2 => [
                "nom" => "L'attaque des titans",
                "description" => "Des géants tout nus qui mangent les gens",
                "prix" => 59.99,
                "categorie" => $mangasCat,
                "image" => "mangas/snk.png"
            ],
            3 => [
                "nom" => "My Hero Academia",
                "description" => "Peut-on devenir un super héros sans 'alter' ?",
                "prix" => 29.99,
                "categorie" => $mangasCat,
                "image" => "mangas/mha.png"
            ],
            4 => [
                "nom" => "One Piece",
                "description" => "Menez la vie d'un vrai pirate !",
                "prix" => 59.99,
                "categorie" => $mangasCat,
                "image" => "mangas/piece.png"
            ],
            5 => [
                "nom" => "Naruto",
                "description" => "Se faire des amis malgré le démon qui est en nous",
                "prix" => 49.99,
                "categorie" => $mangasCat,
                "image" => "mangas/naruto.png"
            ]
        ];

        $posters = [
            0 => [
                "nom" => "Harry Potter",
                "description" => "Le poster du plus célèbre des sorciers",
                "prix" => 49.99,
                "categorie" => $posterCat,
                "image" => "posters/harry.png"
            ],
            1 => [
                "nom" => "Pulp Fiction",
                "description" => "La beauté gracieuse",
                "prix" => 65.54,
                "categorie" => $posterCat,
                "image" => "posters/pulp.png"
            ],
            2 => [
                "nom" => "Stranger Things",
                "description" => "Les enfants douvent faire la loi désormais",
                "prix" => 12.68,
                "categorie" => $posterCat,
                "image" => "posters/things.png"
            ],
            3 => [
                "nom" => "Queen",
                "description" => "Concert intemporel",
                "prix" => 45.98,
                "categorie" => $posterCat,
                "image" => "posters/queen.png"
            ],
            4 => [
                "nom" => "Star Wars",
                "description" => "La guerre des etoiles",
                "prix" => 45.689,
                "categorie" => $posterCat,
                "image" => "posters/starwars.png"
            ],
            5 => [
                "nom" => "Joker",
                "description" => "Tête magistrale",
                "prix" => 96.25,
                "categorie" => $posterCat,
                "image" => "posters/joker.png"
            ]
        ];

        $vinyles = [
            0 => [
                "nom" => "The Beatles - Abbey Road",
                "description" => "Intemporel",
                "prix" => 85.25,
                "categorie" => $vinyleCat,
                "image" => "vinyles/beatles.png"
            ],
            1 => [
                "nom" => "Amy Whinehouse - Back to Black",
                "description" => "Une artiste hors du commun",
                "prix" => 78.54,
                "categorie" => $vinyleCat,
                "image" => "vinyles/amy.png"
            ],
            2 => [
                "nom" => "Nekfeu - Feu",
                "description" => "Ses titres les plus célèbres",
                "prix" => 56.87,
                "categorie" => $vinyleCat,
                "image" => "vinyles/nekfeu.png"
            ],
            3 => [
                "nom" => "Pink Floyd - Dark side of the Moon",
                "description" => "Leurs plus célèbres chansons",
                "prix" => 87.54,
                "categorie" => $vinyleCat,
                "image" => "vinyles/pink.png"
            ],
            4 => [
                "nom" => "Angèle - Brol",
                "description" => "La chanteuse belge qui impressionne",
                "prix" => 52.68,
                "categorie" => $vinyleCat,
                "image" => "vinyles/angele.png"
            ],
            5 => [
                "nom" => "Mickael Jackson - Thriller",
                "description" => "Le vinyle le plus vendu de tous les temps",
                "prix" => 120.68,
                "categorie" => $vinyleCat,
                "image" => "vinyles/jackson.png"
            ]
        ];

        foreach($figurines as $figurine) {
            $produit = new Produit();
            $produit->setNom($figurine["nom"]);
            $produit->setDescription($figurine["description"]);
            $produit->setPrix($figurine["prix"]);
            $produit->setImage($figurine["image"]);
            $produit->setCategorie($figurine["categorie"][0]);

            $manager->persist($produit);
        }

        foreach($mangas as $manga) {
            $produit = new Produit();
            $produit->setNom($manga["nom"]);
            $produit->setDescription($manga["description"]);
            $produit->setPrix($manga["prix"]);
            $produit->setImage($manga["image"]);
            $produit->setCategorie($manga["categorie"][0]);

            $manager->persist($produit);
        }

        foreach($posters as $poster) {
            $produit = new Produit();
            $produit->setNom($poster["nom"]);
            $produit->setDescription($poster["description"]);
            $produit->setPrix($poster["prix"]);
            $produit->setImage($poster["image"]);
            $produit->setCategorie($poster["categorie"][0]);

            $manager->persist($produit);
        }

        foreach($vinyles as $vinyle) {
            $produit = new Produit();
            $produit->setNom($vinyle["nom"]);
            $produit->setDescription($vinyle["description"]);
            $produit->setPrix($vinyle["prix"]);
            $produit->setImage($vinyle["image"]);
            $produit->setCategorie($vinyle["categorie"][0]);

            $manager->persist($produit);
        }

        $manager->flush();
    }
}