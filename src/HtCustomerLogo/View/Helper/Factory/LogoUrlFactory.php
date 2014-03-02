<?php
namespace HtCustomerLogo\View\Helper\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use HtCustomerLogo\View\Helper\LogoUrl;

class LogoUrlFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $helpers)
    {
        $serviceLocator = $helpers->getServiceLocator();
        
        return new LogoUrl(
            $serviceLocator->get('HtCustomerLogo\ModuleOptions')->getDefaultDisplayFilter(),
            $serviceLocator->get('HtCustomerLogo\Service\LogoPathProvider')
        );
    }
}
