<?php

namespace App\Blog\Domain\ValueObject;

use App\Shared\Domain\ValueObject\StringValue;

class PostTitle extends StringValue
{
    public function __construct(?string $value = null, ?int $limit = 255) {
        parent::__construct($value, $limit);
    }
}
