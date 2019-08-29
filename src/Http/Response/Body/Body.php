<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\Http\Response\Body;

interface Body
{
    public function toArray(): array;
}