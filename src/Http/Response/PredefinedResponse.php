<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\Http\Response;


use Funivan\CustomersRest\Http\Response\Body\Body;
use Funivan\CustomersRest\Http\Response\Status\Status;

class PredefinedResponse implements Response
{
    /**
     * @var Status
     */
    private $status;
    /**
     * @var Body
     */
    private $body;

    public function __construct(Status $status, Body $body)
    {
        $this->status = $status;
        $this->body = $body;
    }

    final public function status(): Status
    {
        return $this->status;
    }


    final public function body(): Body
    {
        return $this->body;
    }
}