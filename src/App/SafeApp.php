<?php

namespace Funivan\CustomersRest\App;

use Funivan\CustomersRest\App\Response\Error\ServerErrorResponse;
use Funivan\CustomersRest\Http\Handler\Handler;
use Funivan\CustomersRest\Http\Request\ServerRequest;
use Funivan\CustomersRest\Http\Response\Response;

/**
 * Decorator pattern
 */
class SafeApp implements Handler
{
    /**
     * @var Handler
     */
    private $origin;

    public function __construct(Handler $origin)
    {
        $this->origin = $origin;
    }

    final public function handle(ServerRequest $request): Response
    {
        try {
            return $this->origin->handle($request);
        } catch (\Exception $e) {
            return new ServerErrorResponse($e);
        }
    }
}