<?php


namespace Funivan\CustomersRest\Http\Response\Status;


interface Status
{
    /**
     * Should be 3DIGIT
     */
    public function code(): int;

    /**
     * Reason phrase
     */
    public function phrase(): string;

}