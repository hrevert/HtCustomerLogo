<?php
    
namespace HtCustomerLogo\Model;  

interface StorageCropperInterface
{
    /**
    * This method should crop(or whatever) image as a user's requirements
    */
    public function manipulate($imagePath);
}