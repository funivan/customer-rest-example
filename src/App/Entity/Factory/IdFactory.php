<?php


namespace Funivan\CustomersRest\App\Entity\Factory;

use Funivan\CustomersRest\Spl\ArrayObject\ArrayObject;

interface IdFactory
{
    public function create(ArrayObject $object): string;
}