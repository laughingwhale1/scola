<?php

namespace App\Blog\Application\Payload;

class UpdatePostPayload
{
    public function __construct(public int $id, public ?string $title, public ?string $content) { }
}
