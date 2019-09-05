<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\App\Entity\Factory;


use Funivan\CustomersRest\Spl\ArrayObject\ArrayObject;

class RandomIdFactory implements IdFactory
{

    final public function create(ArrayObject $object): string
    {
        return md5(microtime(true) . random_int(0, 5000));
    }
}