<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\Http\Response\Status;

/**
 * DTO
 */
class PredefinedStatus implements Status
{

    /**
     * @var int
     */
    private $code;
    /**
     * @var string
     */
    private $phrase;

    public function __construct(int $code, string $phrase)
    {
        $this->code = $code;
        $this->phrase = $phrase;
    }

    final public function code(): int
    {
        return $this->code;
    }

    final public function phrase(): string
    {
        return $this->phrase;
    }
}