<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\Http\Request;


use Funivan\CustomersRest\Spl\ArrayObject\ArrayObject;

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

    public function __construct(ArrayObject $get, ArrayObject $data, ArrayObject $server)
    {
        $this->get = $get;
        $this->data = $data;
        $this->server = $server;
    }

    final public function get(): ArrayObject
    {
        return $this->get;
    }

    final public function server(): ArrayObject
    {
        return $this->server;
    }

    final public function data(): ArrayObject
    {
        return $this->data;
    }


}