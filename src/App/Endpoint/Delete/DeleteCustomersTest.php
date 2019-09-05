<?php


use Funivan\CustomersRest\App\Endpoint\Delete\DeleteCustomers;
use Funivan\CustomersRest\Http\Request\ServerRequest;
use Funivan\CustomersRest\Spl\ArrayObject\PredefinedArray;

return function () {
    yield 'Expect same ids in response' => function () {
        $request = new ServerRequest(
            new PredefinedArray(),
            new PredefinedArray([
                'ids' => ['1', '2', '3']
            ]),
            new PredefinedArray()
        );
        $response = (new DeleteCustomers())->handle($request);
        return $response->body()->toArray() === ['ids' => ['1', '2', '3']];
    };
};