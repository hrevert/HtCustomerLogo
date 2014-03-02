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
     * Constructor
     *
     * @param LogoPathProviderInterface $logoPathProvider
     */
    public function __construct(LogoPathProviderInterface $logoPathProvider)
    {
        $this->logoPathProvider = $logoPathProvider;
    }

    /**
     * {@inheritDoc}
     */
    public function resolve($name, Renderer $renderer = null)
    {
        if ($name === 'htcustomerlogo') {
            return $this->logoPathProvider->getLogoPath();
        }
    }
}
