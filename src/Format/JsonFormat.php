<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\Format;


use Funivan\CustomersRest\Http\Parameters\JsonInputFromStream;
use Funivan\CustomersRest\Http\Response\Action\JsonResponseSender;
use Funivan\CustomersRest\Http\Response\Action\ResponseAction;
use Funivan\CustomersRest\Spl\ArrayObject\ArrayObject;

class JsonFormat implements FormatFactory
{

    final public function input(): ArrayObject
    {
        return new JsonInputFromStream();
    }

    final public function sender(): ResponseAction
    {
        return new JsonResponseSender();
    }
}