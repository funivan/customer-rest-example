<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\App\Endpoint\Update;


use Funivan\CustomersRest\App\Endpoint\FromRequestCustomersList;
use Funivan\CustomersRest\App\Entity\CachedCustomersList;
use Funivan\CustomersRest\App\Entity\Factory\FromParametersId;
use Funivan\CustomersRest\App\Repository\CustomersRepository;
use Funivan\CustomersRest\App\Response\CustomerIdsFromListResponseBody;
use Funivan\CustomersRest\Http\Handler\Handler;
use Funivan\CustomersRest\Http\Request\ServerRequest;
use Funivan\CustomersRest\Http\Response\Response;
use Funivan\CustomersRest\Http\Response\SuccessResponse;

class UpdateCustomers implements Handler
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
        $customers = new CachedCustomersList(
            new FromRequestCustomersList($request->data(), new FromParametersId())
        );
        $this->repository->update($customers);
        return new SuccessResponse(
            new CustomerIdsFromListResponseBody($customers)
        );
    }
}