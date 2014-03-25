<?php

namespace HtCustomerLogo\Service;

interface LogoDirectoryProviderInterface
{
    /**
     * Gets directory to logo directory
     *
     * @return string
     */
    public function getUploadDirectory();
}
