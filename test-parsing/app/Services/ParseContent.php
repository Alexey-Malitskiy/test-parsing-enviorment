<?php

namespace App\Services;

use Symfony\Component\DomCrawler\Crawler;
use App\Services\Interfaces\GetContentInterface;
use App\Repositories\Interfaces\PostsInterface;
use App\Repositories\Interfaces\TagsInterface;

class ParseContent
{
    private $content;
    private $posts;
    private $tags;

    /**
     * ParseContent constructor.
     * @param GetContentInterface $getContent
     * @param PostsInterface $posts
     * @param TagsInterface $tags
     */
    public function __construct(GetContentInterface $getContent, PostsInterface $posts, TagsInterface $tags)
    {
        $this->content = $getContent;
        $this->posts = $posts;
        $this->tags = $tags;
    }

    /**
     * @return array
     */
    public function parsePostsUrl(): array
    {
        $crawler = new Crawler($this->content->getContent());
        $postsUrl = $crawler->filter('h2.post__title > a');
        $url = [];
        foreach ($postsUrl as $postUrl) {
            foreach ($postUrl->attributes as $attr) {
                if ($attr->nodeName == 'href' && !empty(preg_match('/post/', $attr->value))) {
                    $url[] = $attr->value;
                }
            }
        }
        return $url;
    }

    public function parsePosts(): void
    {
        $url = $this->parsePostsUrl();
        $posts = [];
        for($i = 0; $i < count($url); $i++) {
            $crawler = new Crawler($this->content->getPost($url[$i]));
            $post = $crawler->filter('.post__body.post__body_full');
            $parseUrl = explode('/', substr($url[$i],0,-1));
            $postNumber = end($parseUrl);
            $tagsContent = $crawler->filter('a.inline-list__item-link.post__tag');
            $tags = [];
            foreach ($tagsContent as $key=>$tag) {
                $tags[] = preg_replace('/\s{2,}/', '', $tag->nodeValue);
                $this->tags->setTag($tags[$key]);
            }
            $this->posts->setPost($post->html(), $postNumber, $tags);
            $posts[] = $post;
        }
    }
}
