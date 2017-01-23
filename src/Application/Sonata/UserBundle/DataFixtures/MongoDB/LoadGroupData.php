<?php
namespace DataBundle\DataFixtures\MongoDB;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Application\Sonata\UserBundle\Document\Group;

class LoadGroupData implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$GroupAdmin = new Group('FirstGroup');
		$GroupAdmin->setName('FirstGroup');
		$role = array('ROLE_USER');
		$GroupAdmin->setRoles($role);

		$manager->persist($GroupAdmin);
		$manager->flush();
	}
}