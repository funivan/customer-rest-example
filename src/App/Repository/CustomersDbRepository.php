<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\App\Repository;

use Funivan\CustomersRest\App\Endpoint\ListCustomers\Offset;
use Funivan\CustomersRest\App\Entity\Customer;
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

    }

}