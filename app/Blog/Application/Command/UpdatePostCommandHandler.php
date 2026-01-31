<?php

namespace App\Blog\Application\Command;


use App\Blog\Application\Payload\UpdatePostPayload;
use App\Blog\Domain\ValueObject\PostContent;
use App\Blog\Domain\ValueObject\PostTitle;
use App\Blog\Infrastructure\Repository\PostRepository;
use Throwable;

readonly class UpdatePostCommandHandler
{
    public function __construct(
        private PostRepository $repository,
    )
    {
    }


    /**
     * @throws Throwable
     */
    public function handle(UpdatePostPayload $payload): int
    {
        $postAggregate = $this->repository->findOrFail($payload->id);
        $postAggregate->setTitle(new PostTitle($payload->title));
        $postAggregate->setContent(new PostContent($payload->content));

        return $this->repository->save($postAggregate);
    }
}
