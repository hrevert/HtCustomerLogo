<?php
namespace HtCustomerLogo\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use HtCustomerLogo\Options\ModuleOptions;

class ModuleOptionsFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new ModuleOptions($serviceLocator->get('Config')['htcustomerlogo']);
    }
}
