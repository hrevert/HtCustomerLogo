<?php
    
namespace HtCustomerLogo\Image;

use PHPThumb\GD as PHPThumb;

class Crop extends AbstractResizing
{
    protected $x1;

    protected $y1;

    protected $x2;

    protected $y2;

    public function setX1($x1)
    {
        $this->x1 = $x1;
    }

    public function getX1()
    {
        return $this->x1;
    }

    public function setX2($x2)
    {
        $this->x2 = $x2;
    }

    public function getX2()
    {
        return $this->x2;
    }

    public function setY1($y1)
    {
        $this->y1 = $y1;
    }

    public function getY1()
    {
        return $this->y1;
    }

    public function setY2($y2)
    {
        $this->y2 = $y2;
    }

    public function getY2()
    {
        return $this->y2;
    }

    public function setXcoordinates(array $xcoordinates)
    {
        $this->setX1($xcoordinates[0]);
        $this->setX2($xcoordinates[1]);
    }

    public function setYcoordinates(array $ycoordinates)
    {
        $this->setY1($ycoordinates[0]);
        $this->setY2($ycoordinates[1]);
    }

    protected function manipulate(PHPThumb $thumb)
    {
        $this->crop(
            $this->getX1(),
            $this->getX2(),
            $this->getX3(),
            $this->getX4()
        );
    }
}
