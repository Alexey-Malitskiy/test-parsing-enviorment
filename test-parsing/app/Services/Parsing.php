<?php

namespace App\Services;

use App\Repositories\Posts;
use App\Repositories\Tags;

class Parsing
{
    public function makeParsing(): void
    {
        $getContent = new GetContent();
        $posts = new Posts();
        $tags = new Tags();
        $parseContent = new ParseContent($getContent, $posts, $tags);
        $parseContent->parsePosts();
    }
}
