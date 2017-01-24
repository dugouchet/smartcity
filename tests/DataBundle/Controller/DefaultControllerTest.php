<?php

namespace DataBundle\Tests\Controller;

#use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Liip\FunctionalTestBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
	public function setUp(){
			$fixtures = array(
					'DataBundle\DataFixtures\MongoDB\LoadTransitionData'
			);
		
			$this->loadFixtures($fixtures, null, 'doctrine_mongodb');
		
	}
    public function testElasticsearch()
    {
    }
}
