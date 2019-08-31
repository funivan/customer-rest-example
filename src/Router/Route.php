<?php

namespace Funivan\CustomersRest\Router;


use Funivan\CustomersRest\Http\Handler\Handler;
use Funivan\CustomersRest\Http\Request\ServerRequest;

interface Route extends Handler
{
    public function match(ServerRequest $request): bool;
}