<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\Http\Parameters;


use Funivan\CustomersRest\Spl\ArrayObject\ArrayObject;

class JsonInputFromStream implements ArrayObject
{

    final public function toArray(): array
    {
        return (array) json_decode(
            (string)file_get_contents('php://input'),
            true
        );
    }
}