<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\User;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class LoadUserData implements FixtureInterface, ContainerAwareInterface {
    
	private $container;

	/**
	 * Load data fixtures with the passed EntityManager
	 *
	 * @param ObjectManager $manager 
	 *
	 * @return mixed
	 */
	function load(ObjectManager $manager) {
		$user = new User();
		$user->setUsername("admin");
		$user->setEmail("test@test.com");
		$encoder = $this->container->get("security.password_encoder");
		$password = $encoder->encodePassword($user, "test");
		$user->setPassword($password);

		$manager->persist($user);
		$manager->flush();

		
	}

	public function setContainer(ContainerInterface $container = null) {
		$this->container = $container;
	}
}