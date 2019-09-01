<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\App\Response;


use Funivan\CustomersRest\Http\Response\Body\Body;

class CustomerIdsResponseBody implements Body
{

    /**
     * @var string[]
     */
    private $ids;

    /**
     * @param string[] $ids
     */
    public function __construct(array $ids)
    {
        $this->ids = $ids;
    }

    final public function toArray(): array
    {
        return ['ids' => $this->ids];
    }
}