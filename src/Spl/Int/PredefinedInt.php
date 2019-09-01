<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\Spl\Int;

class PredefinedInt implements IntObject
{
    /**
     * @var int
     */
    private $number;

    public function __construct(int $number)
    {
        $this->number = $number;
    }

    final public function toInt(): int
    {
        return $this->number;
    }
}