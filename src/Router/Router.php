<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\Router;


use Funivan\CustomersRest\Http\Handler\Handler;
use Funivan\CustomersRest\Http\Request\Request;
use Funivan\CustomersRest\Http\Response\Response;

/**
 * Strategy pattern
 */
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

    final public function handle(Request $request): Response
    {
        foreach ($this->routes as $route) {
            if ($route->match($request)) {
                return $route->handle($request);
            }
        }
        return $this->notFound;
    }
}