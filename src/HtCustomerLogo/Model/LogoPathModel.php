<?php

namespace HtCustomerLogo\Model;

use HtCustomerLogo\Options\LogoStorageOptionsInterface;

class LogoPathModel
{

    const LOGO_DEFAULT_FILENAME = "logo.png";
    
    /**
    * @var LogoDirectoryProviderInterface
    */
    protected $logoDirectoryProvider;

    /**
    *@var LogoStorageOptionsInterface
    */
    protected $logoStorageOptions;

    /**
    * sets LogoDirectoryProviderInterface to property, $logoDirectoryProvider
    * @param $logoDirectoryProvider LogoDirectoryProviderInterface
    * @return void
    */
    public function setLogoDirectoryProvider(LogoDirectoryProviderInterface $logoDirectoryProvider)
    {
        $this->logoDirectoryProvider = $logoDirectoryProvider;   
    }

    /**
    * gets LogoDirectoryProviderInterface
    * @return LogoDirectoryProviderInterface
    */
    public function getLogoDirectoryProvider()
    {
        return $this->logoDirectoryProvider;
    }

    /**
    * sets LogoStorageOptionsInterface to property, $logoStorageOptions
    * @param $logoStorageOptions LogoStorageOptionsInterface
    * @return void
    */
    public function setLogoStorageOptions(LogoStorageOptionsInterface $logoStorageOptions)
    {
        $this->logoStorageOptions = $logoStorageOptions;   
    }

    /**
    * gets LogoStorageOptionsInterface
    * @return LogoStorageOptionsInterface
    */
    public function getLogoStorageOptions()
    {
        return $this->logoStorageOptions;
    }

    /**
    * gets upload directory
    * @return string(directory path)
    */
    public function getLogoDirectory()
    {
        //var_dump($this->getLogoStorageOptions());
        if ($this->getLogoStorageOptions()->getUploadDirectory() !== null) {
            return $this->getLogoStorageOptions()->getUploadDirectory();
        }

        if (!$this->getLogoDirectoryProvider() instanceof LogoDirectoryProviderInterface) {
            throw new \RunTimeException("Please define upload directory.");
        }
        //var_dump($this->getLogoDirectoryProvider());
        return $this->getLogoDirectoryProvider()->getUploadDirectory();
    }

    /**
    * gets path to image(logo)
    * @return string
    */
    public function getLogoPath()
    {
        if ($this->getLogoDirectoryProvider() instanceof LogoPathProviderInterface) {
            return $this->getLogoDirectoryProvider()->getLogoPath();
        }
        return $this->getLogoDirectory().'/'.self::LOGO_DEFAULT_FILENAME;
    }
}
