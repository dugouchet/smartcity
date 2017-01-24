<?php

namespace DataBundle\Tests\Controller;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
#use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Liip\FunctionalTestBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
class DefaultControllerTest extends WebTestCase
{
	private $dm;
	
	public function setUp(){
		
		    self::bootKernel();
		    $this->container = static::$kernel->getContainer();
		    $this->dm = static::$kernel->getContainer()->get('doctrine_mongodb')->getManager();
		    
			$fixtures = array(
					'DataBundle\DataFixtures\MongoDB\LoadTransactionData'
			);
	        // load if not load and after do : app/console fos:elastica populate	
			//$this->loadFixtures($fixtures, null, 'doctrine_mongodb');
		
	}
    public function testElasticsearch()
    {	/*
    	$transaction = $this->dm
    	->getRepository('DataBundle:Transaction')
    	->findTransaction('10')
    	;
    	*/
    	// get finder object first for our index
    	$finder = $this->container->get('fos_elastica.finder.app.transaction');
    	// find with exact phrase "demo elasticsearch" in title or content
    	$transaction = $finder->find("10");
    	    	
    	$this->assertCount(1, $transaction);
    	
    }
}
