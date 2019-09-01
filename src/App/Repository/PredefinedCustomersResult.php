<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\App\Repository;

use Funivan\CustomersRest\App\Entity\Customer;

class PredefinedCustomersResult implements CustomersResult
{
    /**
     * @var Customer[]
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


    /**
     * @param Customer[] $customers
     */
    public function __construct(array $customers = [], int $nextOffset = 0, int $previousOffset = 0)
    {
        $this->customers = $customers;
        $this->nextOffset = $nextOffset;
        $this->previousOffset = $previousOffset;
    }

    /**
     * @return Customer[]
     */
    public function getIterator(): iterable
    {
        yield from $this->customers;
    }

    public function nextOffset(): int
    {
        return $this->nextOffset;
    }

    public function previousOffset(): int
    {
        return $this->previousOffset;
    }
}