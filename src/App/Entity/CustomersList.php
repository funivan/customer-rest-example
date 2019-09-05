<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\App\Entity;

use IteratorAggregate;

interface CustomersList extends IteratorAggregate
{
    /**
     * @return iterable
     */
    public function getIterator(): iterable;
}