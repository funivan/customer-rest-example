<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\Http\Request\Action;


use Funivan\CustomersRest\Http\Request\Request;

interface RequestAction
{
    public function execute(Request $request): void;
}