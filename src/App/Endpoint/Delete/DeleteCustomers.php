<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\App\Endpoint\Delete;


use Funivan\CustomersRest\App\Response\CustomerIdsResponseBody;
use Funivan\CustomersRest\Http\Handler\Handler;
use Funivan\CustomersRest\Http\Parameters\StringList\StringListParameter;
use Funivan\CustomersRest\Http\Request\ServerRequest;
use Funivan\CustomersRest\Http\Response\Response;
use Funivan\CustomersRest\Http\Response\SuccessResponse;

class DeleteCustomers implements Handler
{

    final public function handle(ServerRequest $request): Response
    {
        $ids = iterator_to_array(
            new StringListParameter($request->data(), 'ids')
        );
        //@todo implement deletion
        return new SuccessResponse(
            new CustomerIdsResponseBody($ids)
        );
    }
}