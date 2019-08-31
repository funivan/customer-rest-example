<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\Http\Request;


use Funivan\CustomersRest\Http\Parameters\Parameters;
use Funivan\CustomersRest\Http\RequestCookiesInterface;
use Funivan\CustomersRest\Http\RequestInterface;

class ServerRequest implements Request
{

    /**
     * @var Parameters
     */
    private $get;
    /**
     * @var Parameters
     */
    private $post;
    /**
     * @var Parameters
     */
    private $server;

    public function __construct(Parameters $get, Parameters $post, Parameters $server)
    {
        $this->get = $get;
        $this->post = $post;
        $this->server = $server;
    }

    final public function get(): Parameters
    {
        return $this->get;
    }

    final public function server(): Parameters
    {
        return $this->server;
    }

    final public function post(): Parameters
    {
        return $this->post;
    }


}