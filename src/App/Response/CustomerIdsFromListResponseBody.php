<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\App\Response;

use Funivan\CustomersRest\App\Entity\CustomersList;
use Funivan\CustomersRest\Http\Response\Body\Body;

class CustomerIdsFromListResponseBody implements Body
{
    /**
     * @var CustomersList
     */
    private $customers;

    public function __construct(CustomersList $customers)
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