<?php

namespace Funivan\CustomersRest\Http\Response\Action;

use Funivan\CustomersRest\Http\Response\Response;

interface ResponseAction
{
    public function execute(Response $response): void;
}