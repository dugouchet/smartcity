<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = [
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
        	new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),
        	new Doctrine\Bundle\MongoDBBundle\DoctrineMongoDBBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new CoreBundle\CoreBundle(),
            //new UserBundle\UserBundle(),
        	new FOS\UserBundle\FOSUserBundle(),
        	new Sonata\UserBundle\SonataUserBundle('FOSUserBundle'),
        	new Application\Sonata\UserBundle\ApplicationSonataUserBundle(),
        	new FOS\ElasticaBundle\FOSElasticaBundle(),
        		// The admin requires some twig functions defined in the security
        		// bundle, like is_granted. Register this bundle if it wasn't the case
        		// already.
        	new Symfony\Bundle\SecurityBundle\SecurityBundle(),
        		
        		// These are the other bundles the SonataAdminBundle relies on
        	new Sonata\CoreBundle\SonataCoreBundle(),
        	new Sonata\BlockBundle\SonataBlockBundle(),
        	new Knp\Bundle\MenuBundle\KnpMenuBundle(),
        	new Sonata\EasyExtendsBundle\SonataEasyExtendsBundle(),
        		
        		// And finally, the storage and SonataAdminBundle
        	new Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle(),
        	new Sonata\DoctrineMongoDBAdminBundle\SonataDoctrineMongoDBAdminBundle(),
        	new Sonata\AdminBundle\SonataAdminBundle(),
            new DataBundle\DataBundle(),
            new SonataAdminBundle\SmartCitySonataAdminBundle(),
            new MapsBundle\MapsBundle(),
        ];

        if (in_array($this->getEnvironment(), ['dev', 'test'], true)) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
            $bundles[] = new Liip\FunctionalTestBundle\LiipFunctionalTestBundle();
        }

        return $bundles;
    }

    public function getRootDir()
    {
        return __DIR__;
    }

    public function getCacheDir()
    {
        return dirname(__DIR__).'/var/cache/'.$this->getEnvironment();
    }

    public function getLogDir()
    {
        return dirname(__DIR__).'/var/logs';
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }
}
