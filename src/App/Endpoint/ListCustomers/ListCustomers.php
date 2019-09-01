<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\App\Endpoint\ListCustomers;

use Funivan\CustomersRest\App\Entity\Customer;
use Funivan\CustomersRest\App\Response\CustomersBody;
use Funivan\CustomersRest\Http\Handler\Handler;
use Funivan\CustomersRest\Http\Request\ServerRequest;
use Funivan\CustomersRest\Http\Response\PredefinedResponse;
use Funivan\CustomersRest\Http\Response\Response;
use Funivan\CustomersRest\Http\Response\Status\PredefinedStatus;

class ListCustomers implements Handler
{
    final public function handle(ServerRequest $request): Response
    {
        return new PredefinedResponse(
            new PredefinedStatus(200, 'Ok'),
            new CustomersBody([
                new Customer("1", "A", "Aa", "a@gmail.com"),
                new Customer("2", "B", "Bb", "b@gmail.com")
            ])
        );
    }
}