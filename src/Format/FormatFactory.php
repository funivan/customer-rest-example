<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\Format;

use Funivan\CustomersRest\Http\Response\Action\ResponseAction;
use Funivan\CustomersRest\Spl\ArrayObject\ArrayObject;

/**
 * Abstract factory pattern
 */
interface FormatFactory
{
    public function input(): ArrayObject;

    public function sender(): ResponseAction;
}