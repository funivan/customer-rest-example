<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\App\Endpoint\ListCustomers;


use Funivan\CustomersRest\Spl\StringObject;


class PaginationUrl implements StringObject
{
    /**
     * @var string
     */
    private $path;
    /**
     * @var string
     */
    private $offsetName;
    /**
     * @var string
     */
    private $limitName;
    /**
     * @var Offset
     */
    private $offset;

    public function __construct(string $path, string $offsetName, string $limitName, Offset $offset)
    {
        $this->path = $path;
        $this->offsetName = $offsetName;
        $this->limitName = $limitName;
        $this->offset = $offset;
    }

    /**
     * Prototype pattern
     */
    final public function with(int $offset): self
    {
        return new self($this->path, $this->offsetName, $this->limitName, Offset::createFromPlain($offset, $this->offset->getRowCount()));
    }

    final public function toString(): string
    {
        return $this->path . '?' . http_build_query([
                $this->offsetName => $this->offset->getOffset(),
                $this->limitName => $this->offset->getRowCount(),
            ]);
    }
}