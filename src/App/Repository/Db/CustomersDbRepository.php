<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\App\Repository\Db;

use Exception;
use Funivan\CustomersRest\App\Endpoint\ListCustomers\Offset;
use Funivan\CustomersRest\App\Entity\Customer;
use Funivan\CustomersRest\App\Entity\CustomersList;
use Funivan\CustomersRest\App\Repository\CustomersRepository;
use Funivan\CustomersRest\App\Repository\CustomersResult;
use Funivan\CustomersRest\App\Repository\PredefinedCustomersResult;

class CustomersDbRepository implements CustomersRepository
{

    /**
     * @var Db
     */
    private $db;

    public function __construct(Db $db)
    {
        $this->db = $db;
    }

    final public function fetch(Offset $offset): CustomersResult
    {
        //@todo db fetch all customers
        return new PredefinedCustomersResult();
    }

    final public function find(string $id): ?Customer
    {
        $data = $this->db->prepare(
            'SELECT * FROM customers WHERE id = :id limit 1', ['id' => $id]
        )->fetch();
        if (!is_array($data)) {
            throw new Exception('Can not fetch user, invalid result');
        }
        $result = null;
        if ($data !== []) {
            $result = new Customer($data['id'], $data['email'], $data['name'], $data['lastName']);
        }
        return $result;
    }

    final public function create(CustomersList $customers): void
    {
        try {
            $this->db->beginTransaction();
            foreach ($customers as $entity) {
                $this->db->prepare(
                    'INSERT INTO customers SET id=:id, email=:email, `name`=:name, lastName=:lastName',
                    [
                        'id' => $entity->id(),
                        'email' => $entity->email(),
                        'name' => $entity->name(),
                        'lastName' => $entity->lastName()
                    ]
                )->execute();
            }
            $this->db->commit();
        } catch (\Exception $e) {
            $this->db->rollBack();
            throw $e;
        }
    }

    final public function delete(array $ids): void
    {
        try {
            $this->db->beginTransaction();
            foreach ($ids as $id) {
                $this->db->prepare('DELETE FROM customers where id = :id', ['id' => $id])
                    ->execute();
            }
            $this->db->commit();
        } catch (\Exception $e) {
            $this->db->rollBack();
            throw $e;
        }
    }
}