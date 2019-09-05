<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\App\Repository\Db;

use Funivan\CustomersRest\App\Endpoint\ListCustomers\Offset;
use Funivan\CustomersRest\App\Entity\Customer;
use Funivan\CustomersRest\App\Repository\CustomersRepository;
use Funivan\CustomersRest\App\Repository\CustomersResult;
use PDO;

class CustomersDbRepository implements CustomersRepository
{

    /**
     * @var PDO
     */
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    final public function fetch(Offset $offset): CustomersResult
    {
        //@todo db fetch all customers
    }

    final public function find(string $id): ?Customer
    {
        $statement = $this->pdo->prepare('SELECT * FROM customers WHERE id = :id limit 1');
        $statement->bindValue(':id', $id);
        $data = $statement->fetch();
        if (!is_array($data)) {
            throw new DbExecutionException('Can not fetch user, invalid result');
        }
        $result = null;
        if ($data !== []) {
            $result = new Customer($data['id'], $data['email'], $data['name'], $data['lastName']);
        }
        return $result;
    }

    /**
     * @param Customer[] $entities
     */
    final public function create(array $entities): void
    {
        try {
            $this->pdo->beginTransaction();
            foreach ($entities as $entity) {
                $statement = $this->pdo->prepare('INSERT INTO customers SET id=:id, email=:email, `name`=:name, lastName=:lastName');
                $statement->bindValue(':id', $entity->id());
                $statement->bindValue(':email', $entity->email());
                $statement->bindValue(':name', $entity->name());
                $statement->bindValue(':lastName', $entity->lastName());
                $statement->execute();
            }
            $this->pdo->commit();
        } catch (\Exception $e) {
            $this->pdo->rollBack();
            throw $e;
        }
    }
}