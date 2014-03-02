<?php
namespace HtCustomerLogo\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use HtCustomerLogo\Service\LogoService;

class LogoServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $service = new LogoService;
        $service->setServiceLocator($serviceLocator);

        return $service;
    }
}
