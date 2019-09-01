<?php


namespace Funivan\CustomersRest\App\Repository;

use Funivan\CustomersRest\App\Entity\Customer;

class CustomersRepository
{

    /**
     * @return Customer[]
     */
    final public function all(): array
    {
        //@todo db fetch all customers
        return [];
    }

    final public function find(): ?Customer
    {
        // @todo fetch customer by id
        return null;
    }

}