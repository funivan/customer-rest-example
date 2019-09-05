<?php


namespace Funivan\CustomersRest\App\Entity\Factory;


use Funivan\CustomersRest\Http\Parameters\String\RequiredStringParameter;
use Funivan\CustomersRest\Spl\ArrayObject\ArrayObject;

class FromParametersId implements IdFactory
{

    final public function create(ArrayObject $parameters): string
    {
        return (new RequiredStringParameter($parameters, 'id'))->toString();
    }
}