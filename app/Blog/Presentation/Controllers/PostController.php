<?php

namespace App\Blog\Presentation\Controllers;

use App\Blog\Application\Payload\FindPostPayload;
use App\Blog\Presentation\ViewModel\PostViewModel;
use App\Shared\Application\CommandBusInterface;
use App\Blog\Application\Payload\CreatePostPayload;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController
{
    public function __construct(
        private CommandBusInterface $bus
    )
    {

    }
    public function createPost(Request $request): JsonResponse
    {
        $postId = $this->bus->dispatch(new CreatePostPayload(
                $request->get('title'),
                $request->get('content')
            )
        );


        // Todo: make response helper
        return response()->json(['data' => ['id' => $postId]]);
    }

    public function show(Request $request): JsonResponse
    {
        $post = $this->bus->dispatch(new FindPostPayload($request->get('id')));

        return response()->json(['data' => PostViewModel::fromAggregate($post)]);
    }
}
