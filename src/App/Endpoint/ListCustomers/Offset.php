<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\App\Endpoint\ListCustomers;

use Funivan\CustomersRest\Spl\Int\IntObject;
use Funivan\CustomersRest\Spl\Int\PredefinedInt;

class Offset
{

    /**
     * @var IntObject
     */
    private $offset;
    /**
     * @var IntObject
     */
    private $size;

    public function __construct(IntObject $offset, IntObject $size)
    {
        $this->offset = $offset;
        $this->size = $size;
    }

    /**
     * Named constructor.
     */
    public static function createFromPlain(int $offset, int $size): self
    {
        return new self(
            new PredefinedInt($offset),
            new PredefinedInt($size)
        );
    }

    final public function getOffset(): int
    {
        return $this->offset->toInt();
    }

    final public function getRowCount(): int
    {
        return $this->size->toInt();
    }
}