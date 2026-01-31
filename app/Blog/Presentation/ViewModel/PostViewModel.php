<?php

namespace App\Blog\Presentation\ViewModel;

use App\Blog\Domain\Aggregate\PostAggregate;

readonly class PostViewModel
{
    public function __construct(
        private int    $id,
        private string $title,
        private string $content,
    )
    {
    }

    static function fromAggregate(PostAggregate $postAggregate): self
    {
        return new self(
            $postAggregate->getId()->getValue(),
            $postAggregate->getTitle()->getValue(),
            $postAggregate->getContent()->getValue(),
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
        ];
    }
}
