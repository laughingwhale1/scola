<?php

namespace App\Blog\Application\Payload;

class CreatePostPayload
{
    public function __construct(public ?string $title, public ?string $content) { }
}
