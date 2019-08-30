<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\Router;

use Funivan\CustomersRest\Http\Handler\Handler;
use Funivan\CustomersRest\Http\Parameters\FallbackParameter;
use Funivan\CustomersRest\Http\Request\Request;
use Funivan\CustomersRest\Http\Response\Response;

class PredefinedRoute implements Route
{
    /**
     * @var string
     */
    private $method;
    /**
     * @var string
     */
    private $url;
    /**
     * @var Handler
     */
    private $next;

    public function __construct(string $method, string $url, Handler $next)
    {
        $this->method = $method;
        $this->url = $url;
        $this->next = $next;
    }

    final public function match(Request $request): bool
    {
        $result = false;
        $parameters = $request->server();
        $url = new FallbackParameter($parameters, 'REQUEST_URI', '/');
        if ($url->toString() === $this->url) {
            $method = new FallbackParameter($parameters, 'REQUEST_METHOD', '');
            if ($method->toString() === $this->method) {
                $result = true;
            }
        }
        return $result;
    }

    final public function handle(Request $request): Response
    {
        return $this->next->handle($request);
    }
}