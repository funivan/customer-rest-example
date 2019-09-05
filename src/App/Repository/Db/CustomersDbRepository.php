<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\App\Repository\Db;

use Funivan\CustomersRest\App\Endpoint\ListCustomers\Limit;
use Funivan\CustomersRest\App\Entity\CustomersList;
use Funivan\CustomersRest\App\Repository\CustomersRepository;
use Funivan\CustomersRest\App\Repository\CustomersResult;
use RuntimeException;

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

    final public function fetch(Limit $limit): CustomersResult
    {
        $statement = $this->db->prepare(
            'SELECT SQL_CALC_FOUND_ROWS * FROM customers LIMIT ' . $limit->getOffset() . ', ' . $limit->getRowsCount()
        );
        $statement->execute();
        $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
        $rowsNumStatement = $this->db->prepare('SELECT FOUND_ROWS() as rowcount');
        $rowsNumStatement->execute();
        $size = (int)$rowsNumStatement->fetchColumn();
        return new FromDbCustomersResult($result, $size, $limit);
    }

    final public function create(CustomersList $customers): void
    {
        try {
            $this->db->beginTransaction();
            foreach ($customers as $entity) {
                $this->db->prepare(
                    'INSERT INTO customers SET id = :id, email = :email, `name`= :name, last_name = :last_name, update_time = :update_time',
                    [
                        'id' => $entity->id(),
                        'email' => $entity->email(),
                        'name' => $entity->name(),
                        'last_name' => $entity->lastName(),
                        'update_time' => time()
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

    final public function update(CustomersList $customers): void
    {
        try {
            $this->db->beginTransaction();
            foreach ($customers as $entity) {
                $id = $entity->id();
                $statement = $this->db->prepare(
                    'UPDATE customers SET id = :id, email = :email, `name` = :name, last_name = :lastName, update_time = :update_time WHERE id = :id ',
                    [
                        'id' => $id,
                        'email' => $entity->email(),
                        'name' => $entity->name(),
                        'lastName' => $entity->lastName(),
                        'update_time' => time()
                    ]
                );
                $statement->execute();
                if ($statement->rowCount() === 0) {
                    throw new RuntimeException(
                        sprintf('Zero rows affected. Can not update customer with id: %s', $id)
                    );
                }
            }
            $this->db->commit();
        } catch (\Exception $e) {
            $this->db->rollBack();
            throw $e;
        }
    }
}