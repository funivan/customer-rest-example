<?php

namespace Funivan\CustomersRest\App\Repository;

use Funivan\CustomersRest\App\Endpoint\ListCustomers\Limit;
use Funivan\CustomersRest\App\Entity\CustomersList;

interface CustomersRepository
{
    public function fetch(Limit $offset): CustomersResult;

    public function create(CustomersList $customers): void;

    /**
     * @param string[] $ids
     */
    public function delete(array $ids): void;

    public function update(CustomersList $customers): void;
}