<?php
namespace HtCustomerLogo\Imagine\Loader;

use HtImgModule\Imagine\Loader\LoaderInterface;
use HtCustomerLogo\Service\LogoPathProviderInterface;

class LogoLoader implements LoaderInterface
{
    /**
     * @var LogoPathProviderInterface
     */
    protected $logoPathProvider;

    /**
     * @var string  (Logo Path of default logo, used when logo does not exists)
     */
    protected $defaultLogoPath;

    /**
     * Constructor
     *
     * @param LogoPathProviderInterface $logoPathProvider
     */
    public function __construct(LogoPathProviderInterface $logoPathProvider)
    {
        $this->logoPathProvider = $logoPathProvider;
    }

    /**
     * Sets logo path of default logo
     *
     * @param  string $defaultLogoPath
     * @return void
     */
    public function setDefaultLogoPath($defaultLogoPath)
    {
        $this->defaultLogoPath = $defaultLogoPath;
    }

    /**
     * {@inheritDoc}
     */
    public function load($relativePath)
    {
        if ($relativePath === 'htcustomerlogo') {
            $logoPath = $this->logoPathProvider->getLogoPath();

            return is_readable($logoPath) ? $logoPath : $this->defaultLogoPath;
        }
    }
}
