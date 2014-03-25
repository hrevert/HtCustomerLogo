<?php

namespace HtCustomerLogo\View\Helper;

use Zend\View\Helper\AbstractHelper;
use HtCustomerLogo\Service\LogoPathProviderInterface;

class LogoUrl extends AbstractHelper
{
    protected $defaultDisplayFilter;

    protected $logoPathProvider;

    public function __construct($defaultDisplayFilter, LogoPathProviderInterface $logoPathProvider)
    {
        $this->defaultDisplayFilter = $defaultDisplayFilter;
        $this->logoPathProvider = $logoPathProvider;
    }

    public function __invoke($filter = null)
    {
        return $this->getView()->htImgUrl('htcustomerlogo', $filter ? $filter : $this->defaultDisplayFilter);
    }
}
