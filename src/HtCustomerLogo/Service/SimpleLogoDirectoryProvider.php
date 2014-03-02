<?php
namespace HtCustomerLogo\Service;  

use HtCustomerLogo\Options\StorageOptionsInterface;
use HtCustomerLogo\Exception;

class SimpleLogoDirectoryProvider implements LogoDirectoryProviderInterface
{
    /**
     * @var StorageOptionsInterface
     */
    protected $storageOptions;

    /**
     * Constructor
     *
     * @param StorageOptionsInterface $storageOptions
     */
    public function __construct(StorageOptionsInterface $storageOptions)
    {
        $this->storageOptions = $storageOptions;
    }

    /**
     * {@inheritDoc}
     */
    public function getUploadDirectory()
    {
        if (!$this->storageOptions->getUploadDirectory()) {
            throw new Exception\RuntimeException(
                sprintf('No upload directory provided')
            );
        }

        return $this->storageOptions->getUploadDirectory();
    }
}
