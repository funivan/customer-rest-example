<?php

use Funivan\CustomersRest\App\Endpoint\ListCustomers\Limit;
use Funivan\CustomersRest\App\Endpoint\ListCustomers\Pagination\PredefinedPaginationUrl;

return function () {
    yield 'Require all parameters' => function () {
        return '/test?offset=10&limit=40'
            === (new PredefinedPaginationUrl('/test', 'offset', 'limit', Limit::createFromPlain(10, 40)))->toString();
    };
};