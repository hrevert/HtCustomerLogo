<?php

namespace HtCustomerLogo\Service;

use HtCustomerLogo\Options\StorageOptionsInterface;
use HtCustomerLogo\Exception;

class LogoPathProvider implements LogoPathProviderInterface
{

    const LOGO_DEFAULT_FILENAME = 'logo.png';
    
    /**
     * @var LogoDirectoryProviderInterface
     */
    protected $logoDirectoryProvider;

    /**
     * @var StorageOptionsInterface
     */
    protected $storageOptions;

    /**
     * Constructor
     *
     * @param LogoDirectoryProviderInterface $logoDirectoryProvider
     * @param StorageOptionsInterface $storageOptions
     */
    public function __construct(
        LogoDirectoryProviderInterface $logoDirectoryProvider,
        StorageOptionsInterface $storageOptions
    )
    {
        $this->logoDirectoryProvider = $logoDirectoryProvider;
        $this->storageOptions = $storageOptions;   
    }

    /**
     * Gets directory to logo directory
     *
     * @return string
     */
    public function getLogoDirectory()
    {
        $uploadDirectory = $this->logoDirectoryProvider->getUploadDirectory();
        if (!is_dir($uploadDirectory)) {
            throw new Exception\RuntimeException(
                sprintf('Logo directory, %s doesnot exists', $uploadDirectory)
            );
        }

        return $uploadDirectory;
    }

    /**
     * {@inheritDoc}
     */
    public function getLogoPath()
    {
        return $this->getLogoDirectory() . '/' . static::LOGO_DEFAULT_FILENAME;
    }
}
