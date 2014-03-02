<?php
namespace HtCustomerLogo\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use HtCustomerLogo\Service\SimpleLogoDirectoryProvider;

class SimpleLogoDirectoryProviderFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new SimpleLogoDirectoryProvider($serviceLocator->get('HtCustomerLogo\ModuleOptions'));
    }
}
