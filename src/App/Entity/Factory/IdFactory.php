<?php


namespace Funivan\CustomersRest\App\Entity\Factory;

use Funivan\CustomersRest\Spl\ArrayObject\ArrayObject;

/**
 * Factory Method pattern
 */
interface IdFactory
{
    public function create(ArrayObject $parameters): string;
}