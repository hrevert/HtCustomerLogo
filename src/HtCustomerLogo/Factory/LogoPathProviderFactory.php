<?php
namespace HtCustomerLogo\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use HtCustomerLogo\Service\LogoPathProvider;

class LogoPathProviderFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new LogoPathProvider(
            $serviceLocator->get('HtCustomerLogo.LogoDirectoryProvider'),
            $serviceLocator->get('HtCustomerLogo\ModuleOptions')
        );
    }
}
