<?php
namespace HtCustomerLogo;

use Zend\Mvc\MvcEvent;
use HtCustomerLogo\EventManager\LogoResizer;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $application = $e->getApplication();
        $eventManager = $application->getEventManager();
        $serviceManager = $application->getServiceManager();
        $eventManager->getSharedManager()->attachAggregate($serviceManager->get('HtCustomerLogo\LogoResizer'));
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'HtCustomerLogo\ModuleOptions' => function ($sm) {
                    $config = $sm->get('Config');
                    $moduleConfig = isset($config['htcustomerlogo']) ? $config['htcustomerlogo'] : array();
                    //print_r($moduleConfig);
                    return new Options\ModuleOptions($moduleConfig);
                },
                'HtCustomerLogo\LogoPathModel' => function ($sm) {
                    $options = $sm->get('HtCustomerLogo\ModuleOptions');
                    $logoPathModel = new Model\LogoPathModel;
                    if ($sm->has('HtCustomerLogo\LogoDirectoryProvider')) {
                        $logoPathModel->setLogoDirectoryProvider($sm->get('HtCustomerLogo\LogoDirectoryProvider'));
                    }
                    $logoPathModel->setLogoStorageOptions($sm->get('HtCustomerLogo\ModuleOptions'));
                    return $logoPathModel;
                
                },
                'HtCustomerLogo\LogoResizer' => function ($sm) {
                    $resizer = new EventManager\LogoResizer();
                    $resizer->setStorageOptions($sm->get('HtCustomerLogo\ModuleOptions'));
                    return $resizer;
                },
                'HtCustomerLogo\LogoService' => function ($sm) {
                    $service = new Service\LogoService();
                    $service->setServiceLocator($sm);
                    return $service;
                }            
            )
        );
    }
}
