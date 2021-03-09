<?php

namespace App\Services;

use App\Services\Interfaces\GetContentInterface;

class GetContent implements GetContentInterface
{
    /**
     * @return string
     */
    public function getContent(): string
    {
        $url = env('CONTENT_URL', 'https://habrahabr.ru/');
        $getAllPosts = file_get_contents($url);

        return $getAllPosts;
    }

    /**
     * @param string $url
     * @return string
     */
    public function getPost(string $url): string
    {
        $post = file_get_contents($url);

        return $post;
    }
}
