<?php


namespace Funivan\CustomersRest\App\Response;


use Funivan\CustomersRest\App\Entity\Customer;
use Funivan\CustomersRest\Http\Response\Body\Body;

class CustomersBody implements Body
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
        $data = [];
        foreach ($this->customers as $customer) {
            $data[] = [
                'id' => $customer->id(),
                'email' => $customer->email(),
                'name' => $customer->name(),
                'lastName' => $customer->lastName(),
            ];
        }
        return [
            'customers' => [
                $data
            ]
        ];
    }
}