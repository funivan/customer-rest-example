<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\Http\Request;


use Funivan\CustomersRest\Spl\ArrayObject\ArrayObject;
use Funivan\CustomersRest\Spl\ArrayObject\PredefinedArray;

class ServerRequest implements Request
{

    /**
     * @var ArrayObject
     */
    private $get;
    /**
     * @var ArrayObject
     */
    private $data;
    /**
     * @var ArrayObject
     */
    private $server;

    public function __construct(ArrayObject $get = null, ArrayObject $data = null, ArrayObject $server = null)
    {
        $this->get = $get ?? new PredefinedArray();
        $this->data = $data ?? new PredefinedArray();
        $this->server = $server ?? new PredefinedArray();
    }

    final public function data(): ArrayObject
    {
        return $this->data;
    }

    final public function withData(ArrayObject $data): Request
    {
        return new self($this->get(), $data, $this->server());
    }

    final public function get(): ArrayObject
    {
        return $this->get;
    }

    final public function server(): ArrayObject
    {
        return $this->server;
    }
}