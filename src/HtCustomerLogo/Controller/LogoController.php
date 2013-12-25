<?php
    
namespace HtCustomerLogo\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use HtCustomerLogo\Form\LogoForm;
use HtCustomerLogo\Form\LogoValidator;
use Zend\View\Model\JsonModel;

class LogoController extends AbstractActionController
{
    public function uploadAction()
    {
        $form = new LogoForm();

        $logoUploaded = false;
        $error = false;

        $request = $this->getRequest();
        if ($request->isPost()) {
            $validator = new LogoValidator();
            $validator->init();
            $form->setInputFilter($validator);
            $form->setData($request->getFiles()->toArray());
            
            if ($form->isValid() && $this->getService()->uploadLogo($form, $request->getFiles()->toArray())) {
                    $options = $this->getModuleOptions();
                    if ($request->isXmlHttpRequest()) {
                        return new JsonModel(array(
                            'uploaded' => true
                        ));                     
                    } elseif ($options->getPostUploadRoute()) {
                        return call_user_func_array(array($this, 'redirect'), (array) $options->getPostUploadRoute());
                    } 
                    $logoUploaded = true; 
            } else {
                if ($request->isXmlHttpRequest()) {
                    return new JsonModel(array(
                        'error' => true,
                        'messages' => $form->getMessages()
                    ));                    
                } else {
                    $error = true;
                }                 
            }
                       
        }
        return array(
            'form' => $form,
            'logoUploaded' => $logoUploaded,
            'error' => $error
        );
    }

    public function displayAction()
    {
        
    }

    protected function getModuleOptions()
    {
        return $this->getServiceLocator()->get('HtCustomerLogo\ModuleOptions');
    }

    public function getService()
    {
        return $this->getServiceLocator()->get('HtCustomerLogo\LogoService');
    }
}
