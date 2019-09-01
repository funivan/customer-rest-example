<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\Http\Response;

use Funivan\CustomersRest\Http\Response\Body\Body;
use Funivan\CustomersRest\Http\Response\Status\PredefinedStatus;
use Funivan\CustomersRest\Http\Response\Status\Status;

class SuccessResponse implements Response
{

    /**
     * @var Body
     */
    private $body;

    public function __construct(Body $body)
    {
        $this->body = $body;
    }

    final public function status(): Status
    {
        return new PredefinedStatus(200, 'OK');
    }

    final public function body(): Body
    {
        return $this->body;
    }
}