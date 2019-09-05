<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\App\Repository\Db;


use Funivan\CustomersRest\App\Endpoint\ListCustomers\Limit;
use Funivan\CustomersRest\App\Entity\Customer;
use Funivan\CustomersRest\App\Repository\CustomersResult;

class FromDbCustomersResult implements CustomersResult
{
    /**
     * @var array
     */
    private $result;
    /**
     * @var int
     */
    private $size;
    /**
     * @var Limit
     */
    private $limit;

    /**
     * @param array $result
     */
    public function __construct(array $result, int $size, Limit $limit)
    {

        $this->result = $result;
        $this->size = $size;
        $this->limit = $limit;
    }

    /**
     * @return Customer[]
     */
    final public function getIterator(): iterable
    {
        foreach ($this->result as $data) {
            yield new Customer(
                $data['id'],
                $data['email'],
                $data['name'], $data['last_name']
            );
        }
    }

    final public function nextLimit(): ?int
    {
        $result = null;
        $pages = ceil($this->size / $this->limit->getRowsCount());
        if ($pages > $this->limit->getOffset()) {
            $result = $this->limit->getOffset() + $this->limit->getRowsCount();
        }
        return $result;
    }

    final public function previousLimit(): ?int
    {
        $previous = $this->limit->getOffset() - $this->limit->getRowsCount();
        return ($previous >= 0) ? $previous : null;
    }
}