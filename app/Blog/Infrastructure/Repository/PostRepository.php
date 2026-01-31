<?php

namespace App\Blog\Infrastructure\Repository;

use App\Blog\Infrastructure\Model\Post;
use App\Blog\Domain\Aggregate\PostAggregate;
use App\Blog\Domain\ValueObject\PostContent;
use App\Blog\Domain\ValueObject\PostId;
use App\Blog\Domain\ValueObject\PostTitle;
use Illuminate\Database\Eloquent\Builder;
use Throwable;

class PostRepository
{
    /**
     * @return Post|Builder
     */
    private function getQuery(): Post|Builder
    {
        return Post::query();
    }

    /**
     * @param Post $post
     * @return PostAggregate
     * @throws Throwable
     */
    private function toAggregate(Post $post): PostAggregate
    {
        return new PostAggregate(
            new PostId($post->id),
            new PostTitle($post->title),
            new PostContent($post->content)
        );
    }

    public function getAll(): array
    {
        $posts = $this->getQuery()->all();

        return $posts->map(fn(Post $post) => $this->toAggregate($post));
    }

    /**
     * @throws Throwable
     */
    public function findOrFail(int $postId): PostAggregate
    {
        $post = $this->getQuery()->findOrFail($postId);
        return $this->toAggregate($post);
    }

    public function save(PostAggregate $postAggregate): int
    {
        $post = new Post();
        if ($postAggregate->getKey()) {
            $post = Post::findOrFail($postAggregate->getKey());
        }

        $post->title = $postAggregate->getTitle()->getValue();
        $post->content = $postAggregate->getContent()->getValue();
        $post->save();


        return $post->id;
    }
}
