<?php

namespace HtCustomerLogo\Form;

use ZfcBase\InputFilter\ProvidesEventsInputFilter;

class LogoInputFilter extends ProvidesEventsInputFilter
{

    protected $uploadTarget;

    public function __construct($uploadTarget)
    {
        $this->uploadTarget = $uploadTarget;
    }


    public function getUploadTarget()
    {
        return $this->uploadTarget;
    }

    public function init()
    {
        $this->add(array(
            'name' => 'logo',
            'required' => true,
            'filters' => array(
                array(
                    'name' => 'File\RenameUpload',
                    'options' => array(
                        'target' => $this->getUploadTarget(),
                        'overwrite' => true,
                    )
                )            
            )            
        ));
    }
}

