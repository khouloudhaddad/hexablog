<?php

namespace Domain\Blog\UseCases;

use Domain\Blog\Entities\Post;
use Domain\Blog\Test\Adapters\InMemoryPostRepository;

class CreatePost
{
    protected InMemoryPostRepository $postRepository;

    public function __construct(InMemoryPostRepository $repository)
    {
        $this->postRepository = $repository;
    }
    
    public function execute(array $postData): ?Post
    {
        $post = new Post($postData['title'], $postData['content'], $postData['publishedAt']);

        $this->postRepository->save($post);

        return $post;
    }
}