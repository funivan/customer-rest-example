<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\Http\Parameters\String;


use Funivan\CustomersRest\Http\Parameters\InvalidParameter;
use Funivan\CustomersRest\Http\Parameters\Parameters;
use Funivan\CustomersRest\Spl\StringObject;

class RequiredStringParameter implements StringObject
{
    /**
     * @var Parameters
     */
    private $parameters;
    /**
     * @var string
     */
    private $key;

    public function __construct(Parameters $parameters, string $key)
    {
        $this->parameters = $parameters;
        $this->key = $key;
    }

    final public function toString(): string
    {
        $data = $this->parameters[$this->key] ?? null;
        if (!is_string($data)) {
            throw new InvalidParameter($this->key, 'invalid type, expect string');
        }
        return $data;
    }
}