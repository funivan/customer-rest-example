<?php

namespace Funivan\CustomersRest\App\Endpoint\ListCustomers\Pagination;

use Funivan\CustomersRest\Spl\StringObject;

interface PaginationUrl extends StringObject
{
    public function with(int $offset): PaginationUrl;

    public function toString(): string;
}