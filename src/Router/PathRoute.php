<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\Router;

use Funivan\CustomersRest\Http\Handler\Handler;
use Funivan\CustomersRest\Http\Parameters\FallbackParameter;
use Funivan\CustomersRest\Http\Request\ServerRequest;
use Funivan\CustomersRest\Http\Response\Response;

class PathRoute implements Route
{
    /**
     * @var string
     */
    private $url;
    /**
     * @var Handler
     */
    private $next;

    public function __construct(string $url, Handler $next)
    {
        $this->url = $url;
        $this->next = $next;
    }

    final public function match(ServerRequest $request): bool
    {
        $result = false;
        $url = new FallbackParameter($request->server(), 'REQUEST_URI', '/');
        if ($url->toString() === $this->url) {
            $result = true;
        }
        return $result;
    }

    final public function handle(ServerRequest $request): Response
    {
        return $this->next->handle($request);
    }
}