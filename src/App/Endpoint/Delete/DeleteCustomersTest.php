<?php


use Funivan\CustomersRest\App\Endpoint\Delete\DeleteCustomers;
use Funivan\CustomersRest\Http\Parameters\Parameters;
use Funivan\CustomersRest\Http\Request\ServerRequest;

return function () {
    yield 'Expect same ids in response' => function () {
        $request = new ServerRequest(
            new Parameters(),
            new Parameters([
                'ids' => ['1', '2', '3']
            ]),
            new Parameters()
        );
        $response = (new DeleteCustomers())->handle($request);
        return $response->body()->toArray() === ['ids' => ['1', '2', '3']];
    };
};