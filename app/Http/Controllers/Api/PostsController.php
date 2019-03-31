<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;

class PostsController extends Controller
{
    public function index()
    {
        /*select(['title', 'body'])->*/
        $posts = \App\Post::get();
        return  PostResource::collection($posts);
        
    }
}
