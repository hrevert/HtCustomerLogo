<?php
    
namespace HtCustomerLogo\Service;

use ZfcBase\EventManager\EventProvider;
use HtCustomerLogo\Form\LogoForm;
use HtCustomerLogo\Form\LogoInputFilter;

class LogoService extends EventProvider
{

    use \Zend\ServiceManager\ServiceLocatorAwareTrait;

    public function uploadLogo(LogoForm $form, array $files)
    {
        $uploadTarget = $this->getServiceLocator()->get('HtCustomerLogo\LogoPathModel')->getLogoPath();

        if ($this->getModuleOptions()->getDeleteOldImage() === false && is_readable($uploadTarget)) {
            $newName = dirname($uploadTarget)."/"."logo-old-".md5(microtime(true));
            rename($uploadTarget, $newName);
        }

        $inputFilter = new LogoInputFilter($uploadTarget);
        $inputFilter->init();
        $form->setInputFilter($inputFilter);
        $result = $form->isValid();
        try {
            $this->getEventManager()->trigger('logoUploaded', null, array('uploadTarget' => $uploadTarget));     
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }

    protected function getModuleOptions()
    {
        return $this->getServiceLocator()->get('HtCustomerLogo\ModuleOptions');
    }
}
