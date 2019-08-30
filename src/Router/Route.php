<?php

namespace Funivan\CustomersRest\Router;


use Funivan\CustomersRest\Http\Handler\Handler;
use Funivan\CustomersRest\Http\Request\Request;

interface Route extends Handler
{
    public function match(Request $request): bool;
}