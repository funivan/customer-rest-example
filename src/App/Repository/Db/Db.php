<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\App\Repository\Db;


use Funivan\CustomersRest\Spl\ArrayObject\ArrayObject;
use PDO;
use PDOStatement;

class Db
{
    /**
     * @var PDO|null
     */
    private $connection;

    /**
     * @var ArrayObject
     */
    private $parameters;

    public function __construct(ArrayObject $parameters)
    {
        $this->parameters = $parameters;
    }

    private function connection(): PDO
    {
        if ($this->connection === null) {
            $data = $this->parameters->toArray();
            $this->connection = new PDO(
                'mysql:host=' . $data['MYSQL_HOSTNAME'] . ';dbname=' . $data['MYSQL_DATABASE'],
                $data['MYSQL_USER'],
                $data['MYSQL_PASSWORD'],
                [
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                ]
            );
        }
        return $this->connection;
    }

    final public function prepare(string $sql, array $parameters): PDOStatement
    {
        $stm = $this->connection()->prepare($sql);
        foreach ($parameters as $name => $value) {
            $stm->bindValue(':' . $name, $value);
        }
        return $stm;
    }

    final public function beginTransaction(): bool
    {
        return $this->connection()->beginTransaction();
    }

    final public function rollBack(): bool
    {
        return $this->connection()->rollBack();
    }

    final public function commit(): bool
    {
        return $this->connection()->commit();
    }

}