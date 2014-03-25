<?php

namespace HtCustomerLogo\Options;

use Zend\Stdlib\AbstractOptions;
use HtCustomerLogo\Exception;

class ModuleOptions extends AbstractOptions implements StorageOptionsInterface, DisplayOptionsInterface
{
    protected $__strictMode__ = false;

    protected $uploadDirectory = null;

    protected $storageFilter = false;

    protected $displayFilters  = [];

    protected $defaultDisplayFilter = 'htcustomerlogo_display';

    protected $postUploadRoute = false;

    /**
     * @var string  (Logo Path of default logo, used when logo does not exists)
     */
    protected $defaultLogoPath;

    public function setUploadDirectory($uploadDirectory)
    {
        $this->uploadDirectory = $uploadDirectory;
    }

    public function getUploadDirectory()
    {
        return $this->uploadDirectory;
    }

    public function setStorageFilter($storageFilter)
    {
        $this->storageFilter = $storageFilter;

        return $this;
    }

    public function getStorageFilter()
    {
        return $this->storageFilter;
    }

    public function setDisplayFilters($displayFilters)
    {
        $this->displayFilters = $displayFilters;
    }

    public function getDisplayFilters()
    {
        return $this->displayFilters;
    }

    public function setDefaultDisplayFilter($defaultDisplayFilter)
    {
        $this->defaultDisplayFilter = $defaultDisplayFilter;
    }

    public function getDefaultDisplayFilter()
    {
        return $this->defaultDisplayFilter;
    }

    public function setPostUploadRoute($postUploadRoute)
    {
        $this->postUploadRoute = $postUploadRoute;
    }

    public function getPostUploadRoute()
    {
        return $this->postUploadRoute;
    }

    public function setDefaultLogoPath($defaultLogoPath)
    {
        if (!is_readable($defaultLogoPath)) {
            throw new Exception\LogoNotFoundException(sprintf('Default Logo, %s  does not exists', $defaultLogoPath));
        }
        $this->defaultLogoPath = $defaultLogoPath;
    }

    public function getDefaultLogoPath()
    {
        return $this->defaultLogoPath;
    }
}
