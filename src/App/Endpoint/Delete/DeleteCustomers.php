<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\App\Endpoint\Delete;


use Funivan\CustomersRest\App\Repository\CustomersRepository;
use Funivan\CustomersRest\App\Response\CustomerIdsResponseBody;
use Funivan\CustomersRest\Http\Handler\Handler;
use Funivan\CustomersRest\Http\Parameters\StringList\StringListParameter;
use Funivan\CustomersRest\Http\Request\Request;
use Funivan\CustomersRest\Http\Response\Response;
use Funivan\CustomersRest\Http\Response\SuccessResponse;

class DeleteCustomers implements Handler
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
        $ids = iterator_to_array(
            new StringListParameter($request->data(), 'ids')
        );
        $this->repository->delete($ids);
        return new SuccessResponse(
            new CustomerIdsResponseBody($ids)
        );
    }
}