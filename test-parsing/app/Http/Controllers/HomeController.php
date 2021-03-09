<?php

namespace App\Http\Controllers;

use App\Post;
use App\Repositories\Posts;
use Illuminate\Http\Request;
use App\Services\Parsing;
use App\Repositories\Interfaces\PostsInterface;
use App\Jobs\GetParseContent;

class HomeController extends Controller
{
    private $postsInterface;

//    public function __construct(PostsInterface $postsInterface)
//    {
//        $this->postsInterface = $postsInterface;
//    }
    public function index(Posts $posts)
    {
        $allPosts = $posts->getPosts();

//        dd(gettype($allPosts));
        return view('index')->with('allPosts', $allPosts);
//        $test = new Parsing();
//        dd($test->makeParsing());
////        dd(gettype($postsInterface->setPosts()));
////        GetParseContent::dispatch();
////        $testContent = new Parsing();
////        dd($testContent);
////        dd($testContent->makeParsing());
//        $rolation = Post::where('id', '2')->first();
//        $tag = $rolation->tags()->get();
////        dd($tag['tag']);
//        foreach ($tag as $t) {
////            dd($t->tag);
//        }
////        dd(gettype($rolation));

//        return view('welcome', compact('testContent'));
    }

    public function show($postNumber, Posts $posts)
    {
        if(!empty($postNumber)) {
            $post = $posts->getPost($postNumber);

            return view('show')->with('post', $post->post);
        }
    }
}
