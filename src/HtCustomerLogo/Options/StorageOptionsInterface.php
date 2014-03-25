<?php

namespace HtCustomerLogo\Options;

interface StorageOptionsInterface
{
    public function setUploadDirectory($uploadDirectory);

    public function getUploadDirectory();

    public function setStorageFilter($storageFilter);

    public function getStorageFilter();

}
