<?php
    
namespace HtCustomerLogo\Image;

use PHPThumb\GD as PHPThumb;

class CropFromCenter extends BasicResizing
{
    protected function manipulate(PHPThumb $thumb)
    {
        $thumb->cropFromCenter($this->getWidth(), $this->getHeight());

        return $thumb;
    }      
}
