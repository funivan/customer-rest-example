<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\App\Repository;


use Funivan\CustomersRest\App\Entity\CustomersList;

interface CustomersResult extends CustomersList
{
    public function nextLimit(): ?int;

    public function previousLimit(): ?int;
}