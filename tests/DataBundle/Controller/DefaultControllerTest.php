<?php

namespace DataBundle\Tests\Controller;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
#use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Liip\FunctionalTestBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use DataBundle\Entity\Store;
use Doctrine\DBAL\Driver\PDOException;
use Doctrine\DBAL\Exception\NotNullConstraintViolationException;
class DefaultControllerTest extends WebTestCase
{
	protected $dm;
	protected $em;
	protected static $kernel;
	protected static $container;
	
	public static function setUpBeforeClass()
	{
		self::$kernel = new \AppKernel('dev', true);
		self::$kernel->boot();
	
		self::$container = self::$kernel->getContainer();
	}
	
	public function get($serviceId)
	{
		return self::$kernel->getContainer()->get($serviceId);
	}
	
	public function setUp(){
		
		    self::bootKernel();
		    //$this->container = static::$kernel->getContainer();
		    $this->dm = static::$kernel->getContainer()->get('doctrine_mongodb')->getManager();   
		    $this->em = static::$kernel->getContainer()->get('doctrine')->getManager();
		    
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
    	/*
    	// get finder object first for our index
    	$finder = $this->container->get('fos_elastica.finder.app.transaction');
    	// find with exact phrase "demo elasticsearch" in title or content
    	$transaction = $finder->find("10");
    	    	
    	$this->assertCount(1, $transaction);
    	*/    	
    }
    
    public function testInputStore(){
    	
    	$storeAdmin = new Store();
    	$storeAdmin->setName('H&M');
    	$storeAdmin->setAddress('2 rue lamartine');
    	$storeAdmin->setCity('');
    	$storeAdmin->setZipcode(4000000000);
    	$storeAdmin->setState('');
    	
    	$validator = $this->get('validator');
    	$listErrors = $validator->validate($storeAdmin);
    	$this->assertCount(4, $listErrors);
    	
    	$storeAdmin->setCity('Natnes');
    	$storeAdmin->setZipcode(4000000000);
    	$storeAdmin->setState('');
    	 
    	$validator = $this->get('validator');
    	$listErrors = $validator->validate($storeAdmin);
    	$this->assertCount(3, $listErrors);
    	
    	$storeAdmin->setCity('Nantes');
    	$storeAdmin->setZipcode(40000);
    	$storeAdmin->setState('');
    	 
    	$validator = $this->get('validator');
    	$listErrors = $validator->validate($storeAdmin);
    	$this->assertCount(2, $listErrors);
    	
    	$storeAdmin->setCity('Nantes');
    	$storeAdmin->setZipcode(40000);
    	$storeAdmin->setState('France');
    	
    	$validator = $this->get('validator');
    	$listErrors = $validator->validate($storeAdmin);
    	$this->assertCount(1, $listErrors);//One error on translation
    	
    	
    	
    }
    
    protected function tearDown()
    {
    	/*
    	parent::tearDown();
    	$this->dm->close();
    	$this->dm = null;
    	
    	$this->em->close();
    	$this->em = null; // avoid memory leaks
    	*/
    }
}
