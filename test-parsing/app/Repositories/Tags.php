<?php

namespace App\Repositories;

use App\Tag;
use App\Repositories\Interfaces\TagsInterface;

class Tags implements TagsInterface
{
    /**
     * @return object
     */
    public function getTags(): object
    {
        $tags = Tag::all();

        return $tags;
    }

    /**
     * @param string $tag
     * @return object|null
     */
    public static function getTag(string $tag): ?object
    {
        $getTag = Tag::where('tag', $tag)->first();

        return $getTag;
    }

    /**
     * @param string $tag
     * @return bool
     */
    public function checkTag(string $tag): bool
    {
        $check = !empty($this->getTag($tag)) ?? false;

        return $check;
    }

    /**
     * @param string $tag
     */
    public function setTag(string $tag): void
    {
        $check = $this->checkTag($tag);
        if(!$check) {
            $tags = new Tag();
            $tags->tag = $tag;
            $tags->save();
        }
    }
}
