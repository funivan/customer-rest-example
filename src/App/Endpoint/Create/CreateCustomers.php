<?php


namespace Funivan\CustomersRest\App\Endpoint\Create;

use Funivan\CustomersRest\App\Endpoint\FromRequestCustomersList;
use Funivan\CustomersRest\App\Entity\CachedCustomersList;
use Funivan\CustomersRest\App\Entity\Factory\RandomIdFactory;
use Funivan\CustomersRest\App\Repository\CustomersRepository;
use Funivan\CustomersRest\App\Response\CustomerIdsFromListResponseBody;
use Funivan\CustomersRest\Http\Handler\Handler;
use Funivan\CustomersRest\Http\Request\Request;
use Funivan\CustomersRest\Http\Response\Response;
use Funivan\CustomersRest\Http\Response\SuccessResponse;

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

    final public function handle(Request $request): Response
    {
        $customers = new CachedCustomersList(
            new FromRequestCustomersList($request->data(), new RandomIdFactory())
        );
        $this->repository->create($customers);
        return new SuccessResponse(
            new CustomerIdsFromListResponseBody($customers)
        );
    }
}