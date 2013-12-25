<?php

namespace HtCustomerLogo\Image;

use PHPThumb\GD as PHPThumb;

class BasicResizing extends AbstractResizing
{
    protected $width;

    protected $height;

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    protected function manipulate(PHPThumb $thumb)
    {
        $thumb->resize($this->getWidth(), $this->getHeight());

        return $thumb;
    }
}
