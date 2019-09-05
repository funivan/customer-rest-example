<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\Spl\ArrayObject;

class PredefinedArray implements ArrayObject
{

    /**
     * @var array
     */
    private $data;

    public function __construct(array $parameters = [])
    {
        $this->data = $parameters;
    }

    final public function toArray(): array
    {
        return $this->data;
    }
}