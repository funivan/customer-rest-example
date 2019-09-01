<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\App\Endpoint\ListCustomers\Pagination;


/**
 * Nullable object
 */
class NullablePaginationUrl implements PaginationUrl
{

    final public function with(int $offset): PaginationUrl
    {
        return new self();
    }

    final public function toString(): string
    {
        return '';
    }
}