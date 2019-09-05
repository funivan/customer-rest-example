<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\App\Repository;

use Funivan\CustomersRest\App\Entity\Customer;
use Funivan\CustomersRest\App\Entity\CustomersList;
use Funivan\CustomersRest\App\Entity\PredefinedCustomers;

class PredefinedCustomersResult implements CustomersResult
{
    /**
     * @var CustomersList
     */
    private $customers;
    /**
     * @var int
     */
    private $previousOffset;
    /**
     * @var int
     */
    private $nextOffset;


    public function __construct(CustomersList $customers = null, int $nextOffset = 0, int $previousOffset = 0)
    {
        $this->customers = $customers ?? new PredefinedCustomers([]);
        $this->nextOffset = $nextOffset;
        $this->previousOffset = $previousOffset;
    }

    /**
     * @return iterable
     */
    final public function getIterator(): iterable
    {
        return $this->customers->getIterator();
    }

    final public function nextLimit(): ?int
    {
        return $this->nextOffset;
    }

    final public function previousLimit(): ?int
    {
        return $this->previousOffset;
    }
}