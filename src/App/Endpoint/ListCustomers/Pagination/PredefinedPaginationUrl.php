<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\App\Endpoint\ListCustomers\Pagination;


use Funivan\CustomersRest\App\Endpoint\ListCustomers\Limit;


class PredefinedPaginationUrl implements PaginationUrl
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
     * @var Limit
     */
    private $offset;

    public function __construct(string $path, string $offsetName, string $limitName, Limit $offset)
    {
        $this->path = $path;
        $this->offsetName = $offsetName;
        $this->limitName = $limitName;
        $this->offset = $offset;
    }

    /**
     * Prototype pattern
     */
    final public function with(int $offset): PaginationUrl
    {
        return new self($this->path, $this->offsetName, $this->limitName, Limit::createFromPlain($offset, $this->offset->getRowCount()));
    }

    final public function toString(): string
    {
        return $this->path . '?' . http_build_query([
                $this->offsetName => $this->offset->getOffset(),
                $this->limitName => $this->offset->getRowCount(),
            ]);
    }
}