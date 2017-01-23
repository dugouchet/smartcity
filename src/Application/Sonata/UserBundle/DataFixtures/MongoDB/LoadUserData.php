<?php
namespace DataBundle\DataFixtures\MongoDB;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Application\Sonata\UserBundle\Document\User;
use Application\Sonata\UserBundle\Document\Group;
class LoadUserData implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$userAdmin = new User();
		$userAdmin->setUsername('firstUser');
		$userAdmin->setPassword('firstUser');
		$userAdmin->setEmail('firstUser@gmail.com');
		
		$GroupAdmin = new Group('Group');
		$GroupAdmin->setName('Group');
		$role = array('ROLE_USER');
		$GroupAdmin->setRoles($role);
		
		$userAdmin->setGroups($GroupAdmin);

		$manager->persist($userAdmin);
		$manager->flush();
	}
}