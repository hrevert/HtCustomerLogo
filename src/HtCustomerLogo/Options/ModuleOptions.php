<?php
    
namespace HtCustomerLogo\Options;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions implements LogoStorageOptionsInterface
{
    protected $uploadDirectory = null;

    protected $storageResizer = false;

    protected $serveCroppedImage  = true;

    protected $postUploadRoute;

    protected $deleteOldImage = true;

    public function setUploadDirectory($uploadDirectory)
    {
        $this->uploadDirectory = $uploadDirectory;
    }

    public function getUploadDirectory()
    {
        return $this->uploadDirectory;
    }

    public function setStorageResizer(array $storageResizer)
    {
        $this->storageResizer = $storageResizer;
    }

    public function getStorageResizer()
    {
        return $this->storageResizer;
    }


    public function setServeCroppedImage($serveCroppedImage)
    {
        $this->serveCroppedImage = $serveCroppedImage;
    }

    public function getServeCroppedImage()
    {
        return $this->serveCroppedImage;
    }

    public function setPostUploadRoute($postUploadRoute)
    {
        $this->postUploadRoute = $postUploadRoute;
    }

    public function getPostUploadRoute()
    {
        return $this->postUploadRoute;
    }

    public function setDeleteOldImage($deleteOldImage)
    {
        $this->deleteOldImage = (bool) $deleteOldImage;
    }

    public function getDeleteOldImage()
    {
        return $this->deleteOldImage;
    }

}
