<?php

namespace HtCustomerLogo\Form;

use ZfcBase\InputFilter\ProvidesEventsInputFilter;
use Zend\Validator\NotEmpty;

class LogoValidator extends ProvidesEventsInputFilter
{
    public function __construct()
    {
        $this->add(array(
            'name' => 'logo',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'File\Extension',
                    'options' => array(
                        'extension' => array('jpeg', 'jpg', 'png', 'gif')
                    )
                ),
                /*array(
                    'name' => 'File\FilesSize',
                    'options' => array(
                        'max' => '25MB'
                    )

                ),*/
                array(
                    'name' => 'File\UploadFile',
                ),
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            NotEmpty::IS_EMPTY => 'Please enter a image!'
                        )
                    )
                )
            )
        ));
    }
}
