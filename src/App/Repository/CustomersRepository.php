<?php

namespace Funivan\CustomersRest\App\Repository;

use Funivan\CustomersRest\App\Endpoint\ListCustomers\Offset;
use Funivan\CustomersRest\App\Entity\Customer;
use Funivan\CustomersRest\App\Entity\CustomersList;

interface CustomersRepository
{
    public function fetch(Offset $offset): CustomersResult;

    public function find(string $id): ?Customer;

    public function create(CustomersList $customers): void;

    /**
     * @param string[] $ids
     */
    public function delete(array $ids): void;

    public function update(CustomersList $customers): void;
}