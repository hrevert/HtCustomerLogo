<?php
    
namespace HtCustomerLogo\Options;

interface DisplayOptionsInterface
{
    public function getDisplayFilters();

    public function setDisplayFilters($displayFilters);

    public function setDefaultDisplayFilter($defaultDisplayFilter);

    public function getDefaultDisplayFilter();
}
