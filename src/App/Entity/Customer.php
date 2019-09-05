<?php
declare(strict_types=1);

namespace Funivan\CustomersRest\App\Entity;


class Customer
{

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $lastName;


    public function __construct(string $id, string $email, string $name, string $lastName)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->lastName = $lastName;
    }


    final public function id(): string
    {
        return $this->id;
    }

    final public function name(): string
    {
        return $this->name;
    }

    final public function lastName(): string
    {
        return $this->lastName;
    }

    final public function email(): string
    {
        return $this->email;
    }
}