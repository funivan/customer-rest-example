<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\App\Endpoint;


use Funivan\CustomersRest\App\Entity\Customer;
use Funivan\CustomersRest\App\Entity\CustomersList;
use Funivan\CustomersRest\App\Entity\Factory\IdFactory;
use Funivan\CustomersRest\Http\Parameters\InvalidParameter;
use Funivan\CustomersRest\Http\Parameters\String\RequiredStringParameter;
use Funivan\CustomersRest\Spl\ArrayObject\ArrayObject;
use Funivan\CustomersRest\Spl\ArrayObject\PredefinedArray;

class FromRequestCustomersList implements CustomersList
{
    /**
     * @var ArrayObject
     */
    private $parameters;
    /**
     * @var IdFactory
     */
    private $id;

    public function __construct(ArrayObject $parameters, IdFactory $id)
    {
        $this->parameters = $parameters;
        $this->id = $id;
    }

    /**
     * @return iterable
     */
    final public function getIterator(): iterable
    {
        $customers = $this->parameters->toArray()['customers'] ?? null;
        if (!is_array($customers)) {
            throw new InvalidParameter(
                'customers',
                sprintf('expect type to be array, %s given', gettype($customers))
            );
        }
        foreach ($customers as $customer) {
            $parameters = new PredefinedArray($customer);
            yield new Customer(
                $this->id->create($parameters),
                (new RequiredStringParameter($parameters, 'email'))->toString(),
                (new RequiredStringParameter($parameters, 'name'))->toString(),
                (new RequiredStringParameter($parameters, 'lastName'))->toString()
            );
        }
    }
}