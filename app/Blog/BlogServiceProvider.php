<?php

namespace App\Blog;

use App\Blog\Application\Command\CreatePostCommandHandler;
use App\Blog\Application\Command\UpdatePostCommandHandler;
use App\Blog\Application\Payload\CreatePostPayload;
use App\Blog\Application\Payload\FindPostPayload;
use App\Blog\Application\Payload\GetPostsPayload;
use App\Blog\Application\Payload\UpdatePostPayload;
use App\Blog\Application\Query\FindPostQueryHandler;
use App\Blog\Application\Query\GetPostsQueryHandler;
use App\Blog\Infrastructure\Repository\PostRepository;
use App\Shared\Application\CommandBusInterface;
use Carbon\Laravel\ServiceProvider;
use App\Blog\Application\Repository\PostInterfaceRepository;

class BlogServiceProvider extends ServiceProvider
{
    public function register()
    {
//        app()->bind(PostInterfaceRepository::class, PostRepository::class);

        $bus = app()->make(CommandBusInterface::class);
        $bus->map([
            CreatePostPayload::class => CreatePostCommandHandler::class,
            UpdatePostPayload::class => UpdatePostCommandHandler::class,

            FindPostPayload::class => FindPostQueryHandler::class,
            GetPostsPayload::class => GetPostsQueryHandler::class,
        ]);
    }
}
