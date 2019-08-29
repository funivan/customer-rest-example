<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\Http\Response;


use Funivan\CustomersRest\Http\Response\Body\Body;
use Funivan\CustomersRest\Http\Response\Status\Status;

interface Response
{
    public function status(): Status;

    /**
     * @return Body
     */
    public function body(): Body;

}