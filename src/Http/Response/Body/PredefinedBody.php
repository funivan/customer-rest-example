<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\Http\Response\Body;


class PredefinedBody implements Body
{

    /**
     * @var array
     */
    private $array;

    public function __construct(array $array)
    {
        $this->array = $array;
    }

    final public function toArray(): array
    {
        return $this->array;
    }
}