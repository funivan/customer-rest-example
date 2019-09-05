<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\App\Entity;


class CachedCustomersList implements CustomersList
{
    /**
     * @var CustomersList
     */
    private $origin;
    /**
     * @var CustomersList|null
     */
    private $cache;

    public function __construct(CustomersList $origin)
    {
        $this->origin = $origin;
    }

    /**
     * @return Customer[]
     */
    final public function getIterator(): iterable
    {
        if ($this->cache === null) {
            $this->cache = iterator_to_array($this->origin);
        }
        yield from $this->cache;
    }
}