<?php

namespace App\Blog\Domain\ValueObject;

use App\Shared\Domain\ValueObject\IntValue;

class PostId extends IntValue
{
    public function __construct(int $value = null, int $min = 0) {

        parent::__construct($value, $min);
    }
}
