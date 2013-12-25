<?php
namespace HtCustomerLogo\Image;

use PHPThumb\GD as PHPThumb;

class FitToHeight extends BasicResizing
{
    protected function manipulate(PHPThumb $thumb)
    {
        $aspectRatio = $thumb->getCurrentDimensions()['height'] / $thumb->getCurrentDimensions()['width'];
        $width = $this->getHeight() / $aspectRatio;
        $thumb->resize($width, $this->getHeight());

        return $thumb;
    }    
}
