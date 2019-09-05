<?php

namespace Funivan\CustomersRest\Http\Request;

use Funivan\CustomersRest\Spl\ArrayObject\ArrayObject;

interface Request
{
    public function get(): ArrayObject;

    public function server(): ArrayObject;

    public function data(): ArrayObject;
}