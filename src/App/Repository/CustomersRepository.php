<?php

namespace Funivan\CustomersRest\App\Repository;

use Funivan\CustomersRest\App\Endpoint\ListCustomers\Offset;
use Funivan\CustomersRest\App\Entity\Customer;

interface CustomersRepository
{
    public function fetch(Offset $offset): CustomersResult;

    public function find(string $id): ?Customer;
}