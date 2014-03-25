<?php

namespace HtCustomerLogo\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use HtCustomerLogo\Service\LogoServiceInterface;

class LogoController extends AbstractActionController
{
    /**
     * @var LogoServiceInterface
     */
    protected $logoService;

    /**
     * Constructor
     *
     * @param LogoServiceInterface $logoService
     */
    public function __construct(LogoServiceInterface $logoService)
    {
        $this->logoService = $logoService;
    }

    /**
     * @var \HtCustomerLogo\Options\ModuleOptions
     */
    protected $options;

    /**
     * Uploades logo
     */
    public function uploadAction()
    {
        $form = $this->getServiceLocator()->get('HtCustomerLogo\Form\LogoForm');

        $logoUploaded = false;
        $error = false;

        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($this->logoService->storeLogo($request)) {
                $options = $this->getOptions();
                if ($request->isXmlHttpRequest()) {
                    return new JsonModel(array(
                        'uploaded' => true
                    ));
                } elseif ($options->getPostUploadRoute()) {
                    return call_user_func_array(array($this->redirect(), 'toRoute'), (array) $options->getPostUploadRoute());
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

    /**
     * Gets options
     *
     * @param \HtCustomerLogo\Options\ModuleOptions
     */
    protected function getOptions()
    {
        if (!$this->options) {
            $this->options = $this->getServiceLocator()->get('HtCustomerLogo\ModuleOptions');
        }

        return $this->options;
    }

}
