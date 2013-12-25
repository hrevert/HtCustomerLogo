<?php
    
namespace HtCustomerLogo\Options;

interface LogoStorageOptionsInterface
{
    public function setUploadDirectory($uploadDirectory);

    public function getUploadDirectory();

    public function setStorageResizer(array $storageResizer);

    public function getStorageResizer();

} 
