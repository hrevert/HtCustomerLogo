<?php

namespace HtCustomerLogo\Form;

use Zend\Form\Form;
use ZfcBase\Form\ProvidesEventsForm;

class LogoForm extends ProvidesEventsForm
{

    public function __construct()
    {
        parent::__construct('logo');
        $this->setAttribute('class', 'logo-upload');
        $this->setAttribute('enctype', 'multipart/form-data');
        $this->add(array(
            'name' => 'logo',
            'type' => 'File',
            'attributes' => array(
                'required' => true,
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'type'  => 'Submit',
            'attributes' => array(
                'value' => 'Upload',
                'class' => 'btn btn-lg btn-success'
            ),
        ));
        $this->getEventManager()->trigger('init', $this);
    }

}
