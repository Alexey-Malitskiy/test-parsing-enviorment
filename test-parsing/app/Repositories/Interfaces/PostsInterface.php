<?php

namespace App\Repositories\Interfaces;

interface PostsInterface
{
    public function getPosts();

    public function getPost(string $postNumber);

    public function checkPost(string $post);

    public function setPost(string $post, string $postNumbe, array $tags);
}
