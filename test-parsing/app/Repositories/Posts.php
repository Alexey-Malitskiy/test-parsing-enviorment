<?php

namespace App\Repositories;

use App\Post;
use App\Repositories\Interfaces\PostsInterface;

class Posts implements PostsInterface
{
    /**
     * @return object
     */
    public function getPosts(): object
    {
        $posts = Post::all();

        return $posts;
    }

    /**
     * @param string $postNumber
     * @return object|null
     */
    public function getPost(string $postNumber): ?object
    {
        $getPost = Post::where('post_number', $postNumber)->first();

        return $getPost;
    }

    /**
     * @param string $postNumber
     * @return bool
     */
    public function checkPost(string $postNumber): bool
    {
        $check = !empty($this->getPost($postNumber)) ?? false;

        return $check;
    }

    /**
     * @param string $post
     * @param string $postNumber
     * @param array $tags
     */
    public function setPost(string $post, string $postNumber, array $tags): void
    {
        $check = $this->checkPost($postNumber);
        if(!$check) {
            $posts = new Post();
            $posts->post = $post;
            $posts->post_number = $postNumber;
            $posts->save();
            for($i = 0; $i < count($tags); $i++) {
                $tag = Tags::getTag($tags[$i]);
                $tag->posts()->attach($posts);
            }
        } else {
            $currentPost = $this->getPost($postNumber);
            for($i = 0; $i < count($tags); $i++) {
                $tag = Tags::getTag($tags[$i]);
                if (!$tag->posts->contains($currentPost->id)) {
                    $tag->posts()->attach($currentPost);
                }
            }
        }
    }
}
