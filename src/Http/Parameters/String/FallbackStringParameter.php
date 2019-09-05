<?php

declare(strict_types=1);

namespace Funivan\CustomersRest\Http\Parameters\String;


use Funivan\CustomersRest\Http\Parameters\InvalidParameter;
use Funivan\CustomersRest\Spl\ArrayObject\ArrayObject;
use Funivan\CustomersRest\Spl\ArrayObject\PredefinedArray;
use Funivan\CustomersRest\Spl\StringObject;

class FallbackStringParameter implements StringObject
{
    /**
     * @var PredefinedArray
     */
    private $parameters;
    /**
     * @var string
     */
    private $key;
    /**
     * @var string
     */
    private $fallback;

    public function __construct(ArrayObject $parameters, string $key, string $fallback)
    {
        $this->parameters = $parameters;
        $this->key = $key;
        $this->fallback = $fallback;
    }

    final public function toString(): string
    {
        $data = $this->parameters->toArray()[$this->key] ?? $this->fallback;
        if (!is_string($data)) {
            throw new InvalidParameter($this->key, 'invalid type, expect string');
        }
        return $data;
    }
}