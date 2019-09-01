<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\Router;


use Funivan\CustomersRest\Http\Handler\Handler;
use Funivan\CustomersRest\Http\Request\ServerRequest;
use Funivan\CustomersRest\Http\Response\Response;

class Router implements Handler
{
    /**
     * @var array|Route[]
     */
    private $routes;
    /**
     * @var Response
     */
    private $notFound;

    /**
     * @param Route[] $routes
     */
    public function __construct(array $routes, Response $notFound)
    {
        $this->routes = $routes;
        $this->notFound = $notFound;
    }

    final public function handle(ServerRequest $request): Response
    {
        foreach ($this->routes as $route) {
            if ($route->match($request)) {
                return $route->handle($request);
            }
        }
        return $this->notFound;
    }
}