<?php

namespace App\Blog\Application\Query;

use App\Blog\Application\Payload\FindPostPayload;
use App\Blog\Domain\Aggregate\PostAggregate;
use App\Blog\Infrastructure\Repository\PostRepository;

class FindPostQueryHandler
{
    public function __construct(private PostRepository $postRepository)
    {
    }

    public function handle(FindPostPayload $payload): PostAggregate
    {
        return $this->postRepository->findOrFail($payload->postId);
    }
}
