<?php

namespace App\Services\Interfaces;

interface GetContentInterface
{
    public function getContent();

    public function getPost(string $url);
}
