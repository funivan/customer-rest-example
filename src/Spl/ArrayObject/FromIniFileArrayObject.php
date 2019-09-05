<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\Spl\ArrayObject;


class FromIniFileArrayObject implements ArrayObject
{
    /**
     * @var string
     */
    private $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function toArray(): array
    {
        return (array)parse_ini_file($this->path);
    }
}