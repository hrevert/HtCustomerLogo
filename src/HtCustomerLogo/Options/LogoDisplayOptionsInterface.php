<?php
    
namespace HtCustomerLogo\Options;

interface LogoDisplayOptionsInterface
{
    public function getDefaultImageSize();

    public function setDefaultImageSize($defaultImageSize);

    public function setServeCroppedImage($serveCroppedImage);

    public function getServeCroppedImage();
}