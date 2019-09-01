<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\App\Endpoint\Delete;


use Funivan\CustomersRest\App\Response\CustomerIdsResponseBody;
use Funivan\CustomersRest\Http\Handler\Handler;
use Funivan\CustomersRest\Http\Request\ServerRequest;
use Funivan\CustomersRest\Http\Response\Response;
use Funivan\CustomersRest\Http\Response\SuccessResponse;

class DeleteCustomers implements Handler
{

    final public function handle(ServerRequest $request): Response
    {
        var_dump($request->post());
        return new SuccessResponse(
            new CustomerIdsResponseBody(['1', '2', '3'])
        );
    }
}