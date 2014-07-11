<?php
namespace HtCustomerLogo\Imagine\Loader\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use HtCustomerLogo\Imagine\Loader\LogoLoader;

class LogoLoaderFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $resolvers)
    {
        $serviceLocator = $resolvers->getServiceLocator();
        $loader = new LogoLoader($serviceLocator->get('HtCustomerLogo\Service\LogoPathProvider'));
        $loader->setDefaultLogoPath($serviceLocator->get('HtCustomerLogo\ModuleOptions')->getDefaultLogoPath());

        return $loader;
    }
}
