<?php
namespace HtCustomerLogo\Imagine\Resolver;

use HtImgModule\Imagine\Resolver\ResolverInterface;
use Zend\View\Renderer\RendererInterface as Renderer;
use HtCustomerLogo\Service\LogoPathProviderInterface;

class LogoResolver implements ResolverInterface
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
     * @param string $defaultLogoPath
     * @return void 
     */
    public function setDefaultLogoPath($defaultLogoPath)
    {
        $this->defaultLogoPath = $defaultLogoPath;
    }

    /**
     * {@inheritDoc}
     */
    public function resolve($name, Renderer $renderer = null)
    {
        if ($name === 'htcustomerlogo') {
            $logoPath = $this->logoPathProvider->getLogoPath();
            return is_readable($logoPath) ? $logoPath : $this->defaultLogoPath;
        }
    }
}
