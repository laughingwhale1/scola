<?php

namespace App\Shared\Exception\ValueObject;

use App\Shared\Exception\DomainException;

class NumberOverMaxException extends DomainException
{
    public function __construct(public $message = "Over max value", public $max = 1000)
    {
        parent::__construct($this->message);
    }
}
