<?php


namespace Funivan\CustomersRest\App\Endpoint\Create;

use Funivan\CustomersRest\App\Response\CustomerIdsResponseBody;
use Funivan\CustomersRest\Http\Handler\Handler;
use Funivan\CustomersRest\Http\Request\ServerRequest;
use Funivan\CustomersRest\Http\Response\Response;
use Funivan\CustomersRest\Http\Response\SuccessResponse;

class CreateCustomers implements Handler
{

    final public function handle(ServerRequest $request): Response
    {
        return new SuccessResponse(new CustomerIdsResponseBody(["1", "2", "3"]));
    }
}