<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\Http\Handler;

use Funivan\CustomersRest\Http\Request\ServerRequest;
use Funivan\CustomersRest\Http\Response\Response;

interface Handler
{
    public function handle(ServerRequest $request): Response;
}