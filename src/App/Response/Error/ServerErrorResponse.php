<?php

declare(strict_types=1);

namespace Funivan\CustomersRest\App\Response\Error;


use Exception;
use Funivan\CustomersRest\Http\Response\Body\Body;
use Funivan\CustomersRest\Http\Response\Response;
use Funivan\CustomersRest\Http\Response\Status\PredefinedStatus;
use Funivan\CustomersRest\Http\Response\Status\Status;

class ServerErrorResponse implements Response
{
    /**
     * @var Exception
     */
    private $exception;

    public function __construct(Exception $exception)
    {
        $this->exception = $exception;
    }

    final public function status(): Status
    {
        return new PredefinedStatus(500, 'Internal Server Error');
    }

    final public function body(): Body
    {
        // I intentionally expose exception message.
        //  We can rewrite this class and output just "Server error" message
        return new ErrorBody(
            'Server error: ' . $this->exception->getMessage()
        );
    }
}