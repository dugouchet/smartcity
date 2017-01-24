<?php
namespace DataBundle\DataFixtures\MongoDB;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use UserBundle\Entity\User;
use DataBundle\Entity\Store;
use DataBundle\Document\Transaction;

class LoadTransationData implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		for ($i = 1; $i <= 1000; $i++)
		{
			$transactionAdmin = new Transaction();
			$transactionAdmin->setName('Beer'.$i);
			$transactionAdmin->setPrice($i);

			$manager->persist($transactionAdmin);
		}	
		$manager->flush();
	}
}