<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\App;


use Funivan\CustomersRest\Format\FormatFactory;
use Funivan\CustomersRest\Http\Handler\Handler;
use Funivan\CustomersRest\Http\Request\Action\RequestAction;
use Funivan\CustomersRest\Http\Request\Request;

class App implements RequestAction
{
    /**
     * @var FormatFactory
     */
    private $format;
    /**
     * @var Handler
     */
    private $handler;

    public function __construct(FormatFactory $format, Handler $handler)
    {
        $this->format = $format;
        $this->handler = $handler;
    }

    final public function execute(Request $request): void
    {
        $this->format->sender()->execute(
            $this->handler->handle(
                $request->withData($this->format->input())
            )
        );
    }
}