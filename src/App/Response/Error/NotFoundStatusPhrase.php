<?php


namespace Funivan\CustomersRest\App\Response\Error;


use Funivan\CustomersRest\Http\Response\Status\Status;

class NotFoundStatusPhrase implements Status
{


    final public function code(): int
    {
        return 404;
    }

    final public function phrase(): string
    {
        return 'Not Found';
    }
}