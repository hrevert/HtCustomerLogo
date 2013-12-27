<?php
    
namespace HtCustomerLogo\Image;

use Zend\StdLib\AbstractOptions;
use PHPThumb\GD as PHPThumb;

abstract class AbstractResizing extends AbstractOptions implements ResizingInterface
{
    protected $save;

    protected $imagePath;

    public function setOptions(array $options)
    {
        $this->setFromArray($options);
    }

    public function setSave($save = true)
    {
        $this->save = $save;
    }

    public function getSave()
    {
        return $this->save;
    }

    public function setImagepath($imagePath)
    {
        $this->imagePath = $imagePath;
    }

    public function getImagePath()
    {
        return $this->imagePath;
    }

    public function getPhpThumb()
    {
        $thumb = new PHPThumb($this->getImagePath());
        $this->manipulate($thumb);
        if ($this->getSave()) {
            $thumb->save($this->getImagepath());
        }

        return $thumb;        
    }

    abstract protected function manipulate(PHPThumb $thumb);
}
