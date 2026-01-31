<?php

namespace App\Blog\Application\Command;


use App\Blog\Application\Payload\CreatePostPayload;
use App\Blog\Application\Repository\PostInterfaceRepository;
use App\Blog\Domain\Aggregate\PostAggregate;
use App\Blog\Domain\ValueObject\PostContent;
use App\Blog\Domain\ValueObject\PostId;
use App\Blog\Domain\ValueObject\PostTitle;
use App\Blog\Infrastructure\Repository\PostRepository;
use Throwable;

readonly class CreatePostCommandHandler
{
    public function __construct(
        private PostRepository $repository,
    )
    {
    }


    /**
     * @throws Throwable
     */
    public function handle(CreatePostPayload $payload): int
    {

        // here we can throw application exception

        $postAggregate = new PostAggregate(
            new PostId(),
            new PostTitle($payload->title),
            new PostContent($payload->content)
        );

        return $this->repository->save($postAggregate);
    }
}
