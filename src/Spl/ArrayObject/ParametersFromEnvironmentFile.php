<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\Spl\ArrayObject;


class ParametersFromEnvironmentFile implements ArrayObject
{
    /**
     * @var string
     */
    private $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    final public function toArray(): array
    {
        $result = [];
        preg_match_all(
            '!^\s*([^:]+)\s*:\s*([\'\"])(.+)(\\2)\s*$!m',
            file_get_contents($this->path),
            $rawData
        );
        foreach ($rawData[1] as $index => $name) {
            $value = $rawData[3][$index] ?? null;
            if ($value !== null) {
                $result[$name] = $value;
            }
        }
        return $result;
    }
}