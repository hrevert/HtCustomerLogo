<?php
    
namespace HtCustomerLogo\Image;

interface ResizingInterface
{
    public function setOptions(array $options);

    public function getPhpThumb();

    public function setImagepath($imagePath);

    public function getImagePath();

    public function setSave($save = true);

    public function getSave();
}
