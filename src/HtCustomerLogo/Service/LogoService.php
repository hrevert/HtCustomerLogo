<?php
    
namespace HtCustomerLogo\Service;

use ZfcBase\EventManager\EventProvider;
use HtCustomerLogo\Form\LogoForm;
use HtCustomerLogo\Form\LogoValidator;
use HtCustomerLogo\Form\LogoInputFilter;
use Zend\Http\Request;

class LogoService extends EventProvider implements LogoServiceInterface
{
    protected $options;

    protected $logoPathProvider;

    use \Zend\ServiceManager\ServiceLocatorAwareTrait;

    public function storeLogo(Request $request)
    {
        $form = $this->getServiceLocator()->get('HtCustomerLogo\Form\LogoForm');
        $this->getEventManager()->trigger(__FUNCTION__, $this, array('form' => $form, 'request' => $request));
        $validator = new LogoValidator();
        $form->setInputFilter($validator);
        $form->setData($request->getFiles());
        if ($form->isValid()) {
            $uploadTarget = $this->getLogoPathProvider()->getLogoPath();
            if (is_readable($uploadTarget)) {
                unlink($uploadTarget);
            }
            $image= $this->getServiceLocator()->get('HtImg\Imagine')
                ->open($request->getFiles()->toArray()['logo']['tmp_name']);
            $image->save($uploadTarget);
            $this->getEventManager()->trigger(__FUNCTION__ . '.post', $this, array('image' => $image, 'uploadTarget' => $uploadTarget));     

            return true;
        }

        return false;     
    }


    /**
     * Gets options
     *
     * @param \HtCustomerLogo\Options\ModuleOptions
     */
    public function getOptions()
    {
        if (!$this->options) {
            $this->options = $this->getServiceLocator()->get('HtCustomerLogo\ModuleOptions');
        }
        return $this->options;
    }

    public function getLogoPathProvider()
    {
        if (!$this->logoPathProvider) {
            $this->logoPathProvider = $this->getServiceLocator()->get('HtCustomerLogo\Service\LogoPathProvider');
        }
        return $this->logoPathProvider;        
    }
}
