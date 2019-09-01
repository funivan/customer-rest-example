<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\Router;


use Funivan\CustomersRest\Http\Handler\Handler;
use Funivan\CustomersRest\Http\Parameters\String\FallbackStringParameter;
use Funivan\CustomersRest\Http\Request\ServerRequest;
use Funivan\CustomersRest\Http\Response\Response;

class MethodRoute implements Route
{
    /**
     * @var string
     */
    private $method;
    /**
     * @var Handler
     */
    private $next;

    public function __construct(string $method, Handler $next)
    {
        $this->method = $method;
        $this->next = $next;
    }

    final public function match(ServerRequest $request): bool
    {
        $result = false;
        $method = new FallbackStringParameter($request->server(), 'REQUEST_METHOD', '');
        if ($method->toString() === $this->method) {
            $result = true;
        }
        return $result;
    }

    final public function handle(ServerRequest $request): Response
    {
        return $this->next->handle($request);
    }
}