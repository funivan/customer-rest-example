<?php

declare(strict_types=1);

namespace Funivan\CustomersRest\Http\Response\Action;

use Funivan\CustomersRest\Http\Response\Response;

final class JsonResponseSender implements ResponseAction
{

    public function execute(Response $response): void
    {
        $status = $response->status();
        $code = $status->code();
        if (!headers_sent()) {
            header(sprintf('HTTP/%s %s %s', 1.1, $code, $status->phrase()), true, $code);
            header('Content-Type: application/json; charset=utf-8');
        }
        echo \json_encode($response->body()->toArray(), JSON_PRETTY_PRINT);
    }
}