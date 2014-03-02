<?php

namespace HtCustomerLogo\Service;

use Zend\Http\Request;

interface LogoServiceInterface
{
    public function storeLogo(Request $request);
}
