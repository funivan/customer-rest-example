<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\App\Endpoint\ListCustomers\ListBody;

use Funivan\CustomersRest\App\Endpoint\ListCustomers\Pagination\NullablePaginationUrl;
use Funivan\CustomersRest\App\Repository\PredefinedCustomersResult;

return function () {
    yield 'Expect valid structure' => function () {
        return ['customers', 'next', 'previous']
            === array_keys(
                (new CustomersListBody(
                    new PredefinedCustomersResult(),
                    new NullablePaginationUrl()
                ))->toArray()
            );
    };
};