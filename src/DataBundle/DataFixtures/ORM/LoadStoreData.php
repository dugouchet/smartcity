<?php
namespace DataBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use UserBundle\Entity\User;
use DataBundle\Entity\Store;

class LoadStoreData implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$storeAdmin = new Store();
		$storeAdmin->setName('H&M');
		$storeAdmin->setAddress('rue lamartine');

		$manager->persist($storeAdmin);
		$manager->flush();
	}
}