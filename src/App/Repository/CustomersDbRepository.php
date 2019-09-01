<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\App\Repository;

use Funivan\CustomersRest\App\Entity\Customer;
use Funivan\CustomersRest\Spl\IntObject;
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

    final public function fetch(IntObject $offset, IntObject $size): CustomersResult
    {
        //@todo db fetch all customers
    }

    final public function find(string $id): ?Customer
    {

    }

}