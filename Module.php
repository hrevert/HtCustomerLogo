<?php
namespace HtCustomerLogo;

use Zend\Mvc\MvcEvent;
use HtCustomerLogo\EventManager\LogoUploadListener;
use Zend\EventManager\EventInterface;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $application = $e->getApplication();
        $eventManager = $application->getEventManager();
        $serviceManager = $application->getServiceManager();
        $eventManager->getSharedManager()->attachAggregate(new LogoUploadListener);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return [
            'Zend\Loader\ClassMapAutoloader' => [
                __DIR__ . '/autoload_classmap.php',
            ],
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ],
            ],
        ];
    }

    public function getServiceConfig()
    {
        return [
            'invokables' => [
                'HtCustomerLogo\Form\LogoForm' => 'HtCustomerLogo\Form\LogoForm',
            ],
            'factories' => [
                'HtCustomerLogo\ModuleOptions' => 'HtCustomerLogo\Factory\ModuleOptionsFactory',
                'HtCustomerLogo\Service\SimpleLogoDirectoryProvider' => 'HtCustomerLogo\Factory\SimpleLogoDirectoryProviderFactory',
                'HtCustomerLogo\Service\LogoPathProvider' => 'HtCustomerLogo\Factory\LogoPathProviderFactory',
                'HtCustomerLogo\Service\LogoService' => 'HtCustomerLogo\Factory\LogoServiceFactory',
            ],
            'aliases' => [
                'HtCustomerLogo.LogoDirectoryProvider' => 'HtCustomerLogo\Service\SimpleLogoDirectoryProvider',
            ]
        ];
    }

    public function getViewHelperConfig()
    {
        return [
            'factories' => [
                'HtCustomerLogo\View\Helper\LogoUrl' => 'HtCustomerLogo\View\Helper\Factory\LogoUrlFactory',
            ],
            'aliases' => [
                'htCustomerLogo' => 'HtCustomerLogo\View\Helper\LogoUrl',
            ]
        ];
    }
}
