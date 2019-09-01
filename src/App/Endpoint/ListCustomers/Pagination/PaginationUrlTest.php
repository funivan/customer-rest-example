<?php

use Funivan\CustomersRest\App\Endpoint\ListCustomers\Offset;
use Funivan\CustomersRest\App\Endpoint\ListCustomers\Pagination\PaginationUrl;

return function () {
    yield 'Require all parameters' => function () {
        return '/test?offset=10&limit=40'
            === (new PaginationUrl('/test', 'offset', 'limit', Offset::createFromPlain(10, 40)))->toString();
    };
};