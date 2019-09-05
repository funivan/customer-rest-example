<?php


namespace Funivan\CustomersRest\App\Repository\InMemory;


use Funivan\CustomersRest\App\Endpoint\ListCustomers\Offset;
use Funivan\CustomersRest\App\Entity\Customer;
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

    final public function fetch(Offset $offset): CustomersResult
    {
        return new PredefinedCustomersResult();
    }

    final public function find(string $id): ?Customer
    {
        return $this->customers[$id] ?? null;
    }

    /**
     * @param Customer[] $entities
     */
    final public function create(array $entities): void
    {
        foreach ($entities as $entity) {
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
}