<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\App\Endpoint\ListCustomers;

use Funivan\CustomersRest\App\Repository\CustomersRepository;
use Funivan\CustomersRest\Http\Handler\Handler;
use Funivan\CustomersRest\Http\Parameters\FallbackIntParameter;
use Funivan\CustomersRest\Http\Request\ServerRequest;
use Funivan\CustomersRest\Http\Response\Response;
use Funivan\CustomersRest\Http\Response\SuccessResponse;

class ListCustomers implements Handler
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
        $parameters = $request->get();
        return new SuccessResponse(
            new CustomersListBody(
                $this->repository->fetch(
                    new FallbackIntParameter($parameters, 'offset', 0),
                    new FallbackIntParameter($parameters, 'size', 30)
                )
            )
        );
    }
}