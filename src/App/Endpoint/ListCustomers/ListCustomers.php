<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\App\Endpoint\ListCustomers;

use Funivan\CustomersRest\App\Endpoint\ListCustomers\ListBody\CustomersListBody;
use Funivan\CustomersRest\App\Endpoint\ListCustomers\Pagination\PaginationUrl;
use Funivan\CustomersRest\App\Repository\CustomersRepository;
use Funivan\CustomersRest\Http\Handler\Handler;
use Funivan\CustomersRest\Http\Parameters\FallbackIntParameter;
use Funivan\CustomersRest\Http\Request\ServerRequest;
use Funivan\CustomersRest\Http\Response\Response;
use Funivan\CustomersRest\Http\Response\SuccessResponse;

class ListCustomers implements Handler
{
    const DEFAULT_LIMIT = 30;
    /**
     * @var CustomersRepository
     */
    private $repository;
    /**
     * @var string
     */
    private $path;

    public function __construct(CustomersRepository $repository, string $path)
    {
        $this->repository = $repository;
        $this->path = $path;
    }

    final public function handle(ServerRequest $request): Response
    {
        $parameters = $request->get();
        $offset = new Offset(
            new FallbackIntParameter($parameters, 'offset', 0),
            new FallbackIntParameter($parameters, 'size', 30)
        );
        return new SuccessResponse(
            new CustomersListBody(
                $this->repository->fetch(
                    $offset
                ),
                new PaginationUrl($this->path, 'offset', 'size', $offset)
            )
        );
    }
}