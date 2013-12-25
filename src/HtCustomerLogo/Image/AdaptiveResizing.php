<?php

namespace HtCustomerLogo\Image;

use PHPThumb\GD as PHPThumb;

class AdaptiveResizing extends BasicResizing
{
    protected function manipulate(PHPThumb $thumb)
    {
        $thumb->adaptiveResize($this->getWidth(), $this->getHeight());

        return $thumb;
    }    
}
