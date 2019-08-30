<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\App\Endpoint\ListCustomers;

use Funivan\CustomersRest\Http\Handler\Handler;
use Funivan\CustomersRest\Http\Request\Request;
use Funivan\CustomersRest\Http\Response\Body\PredefinedBody;
use Funivan\CustomersRest\Http\Response\PredefinedResponse;
use Funivan\CustomersRest\Http\Response\Response;
use Funivan\CustomersRest\Http\Response\Status\PredefinedStatus;

class ListCustomers implements Handler
{

    final public function handle(Request $request): Response
    {
        return new PredefinedResponse(
            new PredefinedStatus(200, "Ok"),
            new PredefinedBody(['message' => "Hello world"])
        );
    }
}