<?php

namespace App\Shared\Exception\ValueObject;

use App\Shared\Exception\DomainException;

class StringToLongException extends DomainException
{
    public function __construct(public $message = "To long", public $limit = 1000)
    {
        parent::__construct($this->message);
    }
}
