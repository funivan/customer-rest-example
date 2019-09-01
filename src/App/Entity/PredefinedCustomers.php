<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\App\Entity;

class PredefinedCustomers implements CustomersList
{
    /**
     * @var PredefinedCustomers[]
     */
    private $customers;

    public function __construct(array $customers)
    {
        $this->customers = $customers;
    }

    final public function getIterator(): iterable
    {
        return $this->customers;
    }
}