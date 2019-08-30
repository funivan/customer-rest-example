<?php


namespace Funivan\CustomersRest\Http\Parameters;


class Parameters
{

    /**
     * @var array
     */
    private $data;

    /**
     * @param array $parameters Array<String, String>
     */
    public function __construct(array $parameters)
    {
        $this->data = $parameters;
    }

    final public function has(string $name): bool
    {
        return array_key_exists($name, $this->data);
    }

    final public function value(string $name): string
    {
        if (!array_key_exists($name, $this->data)) {
            throw new InvalidParameter($name);
        }
        return (string)$this->data[$name];
    }

}