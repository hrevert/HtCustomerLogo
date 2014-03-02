<?php
namespace HtCustomerLogo\Controller\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use HtCustomerLogo\Controller\LogoController;

class LogoControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $controllers)
    {
        $serviceLocator = $controllers->getServiceLocator();

        return new LogoController($serviceLocator->get('HtCustomerLogo\Service\LogoService'));
    }
}
