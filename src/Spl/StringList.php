<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\Spl;

use IteratorAggregate;

interface StringList extends IteratorAggregate
{
    /**
     * @return string[]
     */
    public function getIterator(): iterable;
}