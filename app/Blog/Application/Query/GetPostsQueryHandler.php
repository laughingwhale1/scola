<?php

namespace App\Blog\Application\Query;

use App\Blog\Application\Payload\GetPostsPayload;
use App\Blog\Domain\Aggregate\PostAggregate;
use App\Blog\Infrastructure\Repository\PostRepository;

readonly class GetPostsQueryHandler
{
    public function __construct(private PostRepository $postRepository)
    {
    }

    /**
     * @return PostAggregate[]
     */
    public function handle(GetPostsPayload $payload): array
    {
        return $this->postRepository->getAll();
    }
}
