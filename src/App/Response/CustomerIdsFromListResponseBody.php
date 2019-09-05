<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\App\Response;

use Funivan\CustomersRest\App\Entity\Customer;
use Funivan\CustomersRest\Http\Response\Body\Body;

class CustomerIdsFromListResponseBody implements Body
{
    /**
     * @var array|Customer[]
     */
    private $customers;

    /**
     * @param Customer[] $customers
     */
    public function __construct(array $customers)
    {
        $this->customers = $customers;
    }

    final public function toArray(): array
    {
        $ids = [];
        foreach ($this->customers as $customer) {
            $ids[] = $customer->id();
        }
        return ['ids' => $ids];
    }
}