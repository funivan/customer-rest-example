<?php

declare(strict_types=1);

namespace Funivan\CustomersRest\Http\Parameters;

class InvalidParameter extends \InvalidArgumentException
{
    public function __construct(string $parameter, string $reason)
    {
        parent::__construct(
            sprintf(
                'Can not fetch parameter: %s[%s]',
                $parameter,
                $reason
            )
        );
    }
}