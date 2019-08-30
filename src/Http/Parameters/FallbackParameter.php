<?php

declare(strict_types=1);

namespace Funivan\CustomersRest\Http\Parameters;


use Funivan\CustomersRest\Spl\Stringable;

class FallbackParameter implements Stringable
{
    /**
     * @var Parameters
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

    public function __construct(Parameters $parameters, string $key, string $fallback)
    {
        $this->parameters = $parameters;
        $this->key = $key;
        $this->fallback = $fallback;
    }

    final public function toString(): string
    {
        return $this->parameters->has($this->key)
            ? $this->parameters->value($this->key)
            : $this->fallback;
    }
}