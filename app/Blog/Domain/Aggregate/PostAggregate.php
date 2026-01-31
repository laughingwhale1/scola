<?php

namespace App\Blog\Domain\Aggregate;

use App\Blog\Domain\ValueObject\PostContent;
use App\Blog\Domain\ValueObject\PostId;
use App\Blog\Domain\ValueObject\PostTitle;

class PostAggregate
{
    public function __construct(
        private PostId $id,
        private PostTitle $title,
        private PostContent $content
    )
    {

    }

    public function setId(PostId $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getTitle(): PostTitle
    {
        return $this->title;
    }

    /**
     * @throws Throwable
     */
    public function setTitle(PostTitle $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): PostContent
    {
        return $this->content;
    }

    public function setContent(PostContent $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getKey(): string|int|null
    {
        return $this->getId()->getValue();
    }

    public function getId(): PostId
    {
        return $this->id;
    }
}
