<?php
    
namespace HtCustomerLogo\Image;

use PHPThumb\GD as PHPThumb;

class FitToWidth extends BasicResizing
{
    protected function manipulate(PHPThumb $thumb)
    {
        $aspectRatio = $thumb->getCurrentDimensions()['height'] / $thumb->getCurrentDimensions()['width'];
        $height = $this->getWidth() * $aspectRatio;
        $thumb->resize($this->getWidth(), $height);

        return $thumb;
    }
    
     
}
