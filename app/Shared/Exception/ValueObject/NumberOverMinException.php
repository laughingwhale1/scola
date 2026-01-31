<?php

namespace App\Shared\Exception\ValueObject;

use App\Shared\Exception\DomainException;

class NumberOverMinException extends DomainException
{
    public function __construct(public $message = "Over min value", public $min = 1000)
    {
        parent::__construct($this->message);
    }
}
