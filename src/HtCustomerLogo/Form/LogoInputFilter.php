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

    public function init()
    {
        $this->add(array(
            'name' => 'logo',
            'required' => true,
            'filters' => array(
                array(
                    'name' => 'File\RenameUpload',
                    'options' => array(
                        'target' => $this->uploadTarget,
                        'overwrite' => true,
                    )
                )            
            )            
        ));
    }
}

