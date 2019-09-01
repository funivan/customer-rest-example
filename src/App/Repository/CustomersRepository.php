<?php

namespace Funivan\CustomersRest\App\Repository;

use Funivan\CustomersRest\App\Entity\Customer;
use Funivan\CustomersRest\Spl\IntObject;

interface CustomersRepository
{
    public function fetch(IntObject $offset, IntObject $size): CustomersResult;

    public function find(string $id): ?Customer;
}