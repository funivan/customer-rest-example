<?php

use Funivan\CustomersRest\App\Endpoint\Create\CreateCustomers;
use Funivan\CustomersRest\App\Repository\InMemory\InMemoryRepository;
use Funivan\CustomersRest\Http\Parameters\InvalidParameter;
use Funivan\CustomersRest\Http\Request\ServerRequest;
use Funivan\CustomersRest\Spl\ArrayObject\PredefinedArray;

return function () {
    yield 'Should create customer' => function () {
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
    yield 'Should show error on invalid field' => function () {
        $data = [
            'customers' => [
                [
                    'email' => 123,
                ],
            ]
        ];
        $e = null;
        $message = '';
        try {
            /** @noinspection UnusedFunctionResultInspection */
            (new CreateCustomers(new InMemoryRepository()))
                ->handle(
                    new ServerRequest(null, new PredefinedArray($data), null)
                );
        } catch (Exception $e) {
            $message = $e->getMessage();
        }
        return $e instanceof InvalidParameter
            && $message === 'Can not fetch parameter: email[invalid type, expect string]';
    };
};