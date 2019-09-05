<?php


namespace Funivan\CustomersRest\App\Endpoint\Create;

use Funivan\CustomersRest\App\Entity\Customer;
use Funivan\CustomersRest\App\Repository\CustomersRepository;
use Funivan\CustomersRest\App\Response\CustomerIdsFromListResponseBody;
use Funivan\CustomersRest\Http\Handler\Handler;
use Funivan\CustomersRest\Http\Parameters\InvalidParameter;
use Funivan\CustomersRest\Http\Parameters\String\RequiredStringParameter;
use Funivan\CustomersRest\Http\Request\ServerRequest;
use Funivan\CustomersRest\Http\Response\Response;
use Funivan\CustomersRest\Http\Response\SuccessResponse;
use Funivan\CustomersRest\Spl\ArrayObject\PredefinedArray;

class CreateCustomers implements Handler
{
    /**
     * @var CustomersRepository
     */
    private $repository;

    public function __construct(CustomersRepository $repository)
    {
        $this->repository = $repository;
    }

    final public function handle(ServerRequest $request): Response
    {
        $customers = $request->data()->toArray()['customers'] ?? [];
        if (!is_array($customers) || $customers === []) {
            throw new InvalidParameter('customers', 'empty or undefined parameter');
        }
        $entities = [];
        foreach ($customers as $customer) {
            $parameters = new PredefinedArray($customer);
            $entities[] = new Customer(
                md5(microtime(true) . random_int(0, 5000)),
                (new RequiredStringParameter($parameters, 'email'))->toString(),
                (new RequiredStringParameter($parameters, 'name'))->toString(),
                (new RequiredStringParameter($parameters, 'lastName'))->toString()
            );
        }
        $this->repository->create($entities);
        return new SuccessResponse(
            new CustomerIdsFromListResponseBody($entities)
        );
    }
}