<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\Http\Parameters;

use Funivan\CustomersRest\Spl\ArrayObject\ArrayObject;
use Funivan\CustomersRest\Spl\Int\IntObject;

class FallbackIntParameter implements IntObject
{
    /**
     * @var ArrayObject
     */
    private $parameters;
    /**
     * @var string
     */
    private $key;
    /**
     * @var int
     */
    private $fallback;

    public function __construct(ArrayObject $parameters, string $key, int $fallback)
    {
        $this->parameters = $parameters;
        $this->key = $key;
        $this->fallback = $fallback;
    }

    final public function toInt(): int
    {
        $data = $this->parameters->toArray()[$this->key] ?? $this->fallback;
        // Php is a strange language
        if (is_int($data) || (is_numeric($data) && ((string)((int)$data)) === $data)) {
            return (int)$data;
        }
        throw new InvalidParameter($this->key, 'invalid type, expect int');
    }
}