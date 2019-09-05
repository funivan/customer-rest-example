<?php

use Funivan\CustomersRest\App\Endpoint\Create\CreateCustomers;
use Funivan\CustomersRest\App\Repository\InMemory\InMemoryRepository;
use Funivan\CustomersRest\Http\Request\ServerRequest;
use Funivan\CustomersRest\Spl\ArrayObject\PredefinedArray;

return function () {
    yield "Should create customer" => function () {
        $data = [
            'customers' => [
                [
                    'email' => 'test1@gmail.com',
                    'name' => 'User1',
                    'lastName' => 'Last1',
                ],
                [
                    'email' => 'test2@gmail.com',
                    'name' => 'User2',
                    'lastName' => 'Last2',
                ],
            ]
        ];
        $response = (new CreateCustomers(new InMemoryRepository()))->handle(
            new ServerRequest(null, new PredefinedArray($data), null));
        $ids = $response->body()->toArray()['ids'] ?? [];
        return count($ids) === 2;
    };
};