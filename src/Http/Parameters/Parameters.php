<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\Http\Parameters;

use Funivan\CustomersRest\Spl\ArrayObject;

class Parameters implements ArrayObject
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