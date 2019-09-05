<?php

declare(strict_types=1);

namespace Funivan\CustomersRest\Http\Parameters\StringList;

use Funivan\CustomersRest\Http\Parameters\InvalidParameter;
use Funivan\CustomersRest\Spl\ArrayObject\ArrayObject;
use Funivan\CustomersRest\Spl\StringList;

class StringListParameter implements StringList
{
    /**
     * @var ArrayObject
     */
    private $object;
    /**
     * @var string
     */
    private $key;

    public function __construct(ArrayObject $object, string $name)
    {
        $this->object = $object;
        $this->key = $name;
    }

    /**
     * @return string[]
     */
    final public function getIterator(): iterable
    {
        $items = $this->object->toArray()[$this->key] ?? null;
        if (!is_array($items)) {
            throw new InvalidParameter($this->key, 'invalid type, expect array');
        }
        foreach ($items as $index => $item) {
            if (!is_string($item)) {
                throw new InvalidParameter($this->key . '.' . $index, 'invalid type, expect string');
            }
            yield $item;
        }
    }
}