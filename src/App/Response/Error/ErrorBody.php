<?php


namespace Funivan\CustomersRest\App\Response\Error;


use Funivan\CustomersRest\Http\Response\Body\Body;

class ErrorBody implements Body
{
    /**
     * @var string
     */
    private $message;

    public function __construct(string $message)
    {
        $this->message = $message;
    }

    final public function toArray(): array
    {
        return [
            'message' => $this->message
        ];
    }
}