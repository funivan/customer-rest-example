<?php


namespace Funivan\CustomersRest\App\Endpoint\ListCustomers;


use Funivan\CustomersRest\App\Repository\CustomersResult;
use Funivan\CustomersRest\Http\Response\Body\Body;

class CustomersListBody implements Body
{
    /**
     * @var CustomersResult
     */
    private $customers;

    public function __construct(CustomersResult $result)
    {
        $this->customers = $result;
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
            ],
            'next'=>'',
            'previous'=>''
        ];
    }
}