<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\Http\Parameters\String;


use Funivan\CustomersRest\Http\Parameters\InvalidParameter;
use Funivan\CustomersRest\Spl\ArrayObject\PredefinedArray;
use Funivan\CustomersRest\Spl\StringObject;

class RequiredStringParameter implements StringObject
{
    /**
     * @var PredefinedArray
     */
    private $parameters;
    /**
     * @var string
     */
    private $key;

    public function __construct(PredefinedArray $parameters, string $key)
    {
        $this->parameters = $parameters;
        $this->key = $key;
    }

    final public function toString(): string
    {
        $data = $this->parameters->toArray()[$this->key] ?? null;
        if (!is_string($data)) {
            throw new InvalidParameter($this->key, 'invalid type, expect string');
        }
        return $data;
    }
}