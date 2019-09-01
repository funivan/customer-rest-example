<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\App\Response\Error;


use Funivan\CustomersRest\Http\Response\Body\Body;
use Funivan\CustomersRest\Http\Response\Response;
use Funivan\CustomersRest\Http\Response\Status\Status;

class NotFoundResponse implements Response
{

    /**
     * @var string
     */
    private $message;

    public function __construct(string $message)
    {
        $this->message = $message;
    }

    final public function status(): Status
    {
        return new NotFoundStatusPhrase();
    }


    final public function body(): Body
    {
        return new ErrorBody('Page not found: ' . $this->message);
    }
}