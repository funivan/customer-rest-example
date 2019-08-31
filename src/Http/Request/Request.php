<?php

namespace Funivan\CustomersRest\Http\Request;

use Funivan\CustomersRest\Http\Parameters\Parameters;

interface Request
{
    public function get(): Parameters;

    public function server(): Parameters;

    public function post(): Parameters;
}