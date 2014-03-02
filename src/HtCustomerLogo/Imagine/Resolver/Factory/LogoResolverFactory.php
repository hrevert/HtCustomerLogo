<?php
namespace HtCustomerLogo\Imagine\Resolver\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use HtCustomerLogo\Imagine\Resolver\LogoResolver;

class LogoResolverFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $resolvers)
    {
        $serviceLocator = $resolvers->getServiceLocator();
        
        return new LogoResolver(
            $serviceLocator->get('HtCustomerLogo\Service\LogoPathProvider')
        ); 
    }
}
