<?php

namespace App\Repositories\Interfaces;

interface TagsInterface
{
    public function getTags();

    public static function getTag(string $tag);

    public function checkTag(string $tag);

    public function setTag(string $tag);
}
