<?php

namespace App\Http\Controllers;

use App\Repositories\Posts;

class HomeController extends Controller
{
    /**
     * @param Posts $posts
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function index(Posts $posts)
    {
        $allPosts = $posts->getPosts();

        return view('index')->with('allPosts', $allPosts);
    }

    /**
     * @param $postNumber
     * @param Posts $posts
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function show($postNumber, Posts $posts)
    {
        if(!empty($postNumber)) {
            $post = $posts->getPost($postNumber);

            return view('show')->with('post', $post->post);
        }
    }
}
