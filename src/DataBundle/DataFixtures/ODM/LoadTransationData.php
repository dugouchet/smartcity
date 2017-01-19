<?php
namespace DataBundle\DataFixtures\ODM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use UserBundle\Entity\User;
use DataBundle\Entity\Store;
use DataBundle\Document\Transaction;

class LoadTransationData implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$transactionAdmin = new Transaction();
		$transactionAdmin->setName('Beer');
		$transactionAdmin->setPrice('5');

		$manager->persist($transactionAdmin);
		$manager->flush();
	}
}