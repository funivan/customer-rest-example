<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\App\Endpoint\Update;


use Funivan\CustomersRest\App\Response\CustomerIdsResponseBody;
use Funivan\CustomersRest\Http\Handler\Handler;
use Funivan\CustomersRest\Http\Request\ServerRequest;
use Funivan\CustomersRest\Http\Response\Response;
use Funivan\CustomersRest\Http\Response\SuccessResponse;

class UpdateCustomers implements Handler
{

    final public function handle(ServerRequest $request): Response
    {
        //@todo implement customers update
        return new SuccessResponse(
            new CustomerIdsResponseBody(['1', '2', '4'])
        );
    }
}