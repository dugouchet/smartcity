<?php
namespace UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use UserBundle\Entity\User;

class LoadUserData implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$userAdmin = new User();
		$userAdmin->setUsername('admin');
		$userAdmin->setPassword('admin');
		$userAdmin->setEmail('admin@gmail.com');

		$manager->persist($userAdmin);
		$manager->flush();
	}
}