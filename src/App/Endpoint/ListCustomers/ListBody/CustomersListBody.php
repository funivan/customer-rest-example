<?php


namespace Funivan\CustomersRest\App\Endpoint\ListCustomers\ListBody;


use Funivan\CustomersRest\App\Endpoint\ListCustomers\Pagination\PaginationUrl;
use Funivan\CustomersRest\App\Repository\CustomersResult;
use Funivan\CustomersRest\Http\Response\Body\Body;

class CustomersListBody implements Body
{
    /**
     * @var CustomersResult
     */
    private $result;
    /**
     * @var PaginationUrl
     */
    private $url;

    public function __construct(CustomersResult $result, PaginationUrl $url)
    {
        $this->result = $result;
        $this->url = $url;
    }

    final public function toArray(): array
    {
        $data = [];
        foreach ($this->result as $customer) {
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
            'next' => $this->url->with($this->result->nextOffset())->toString(),
            'previous' => $this->url->with($this->result->previousOffset())->toString()
        ];
    }
}