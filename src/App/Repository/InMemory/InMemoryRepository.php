<?php


namespace Funivan\CustomersRest\App\Repository\InMemory;


use Funivan\CustomersRest\App\Endpoint\ListCustomers\Limit;
use Funivan\CustomersRest\App\Entity\Customer;
use Funivan\CustomersRest\App\Entity\CustomersList;
use Funivan\CustomersRest\App\Repository\CustomersRepository;
use Funivan\CustomersRest\App\Repository\CustomersResult;
use Funivan\CustomersRest\App\Repository\PredefinedCustomersResult;

class InMemoryRepository implements CustomersRepository
{
    /**
     * @var Customer[]
     */
    private $customers = [];

    /**
     * @param Customer[] $customers
     */
    public function __construct(array $customers = [])
    {
        foreach ($customers as $customer) {
            $this->customers[$customer->id()] = $customer;
        }
    }

    final public function fetch(Limit $limit): CustomersResult
    {
        return new PredefinedCustomersResult();
    }

    final public function create(CustomersList $customers): void
    {
        foreach ($customers as $entity) {
            $id = $entity->id();
            if (array_key_exists($id, $this->customers)) {
                throw new \RuntimeException('Customer already exist');
            }
            $this->customers[$id] = $entity;
        }
    }

    /**
     * @param string[] $ids
     */
    final public function delete(array $ids): void
    {
        foreach ($ids as $id) {
            unset($this->customers[$id]);
        }
    }

    final public function update(CustomersList $customers): void
    {
        foreach ($customers as $customer) {
            $id = $customer->id();
            if (array_key_exists($id, $this->customers)) {
                $this->customers[$id] = $customer;
            } else {
                throw new \RuntimeException(
                    sprintf('Can no update user with id: %s', $id)
                );
            }
        }
    }
}