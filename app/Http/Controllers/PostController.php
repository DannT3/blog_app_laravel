<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function listPosts()
    {
        $posts = Post::orderByDesc("created_at")
            ->get();         
        return view("postslist", ['post' => $posts]);
    }

    public function deletePost($post)
    {

    }

    public function createPost()
    {

    }

    public function storePost()
    {

    }

    public function updatePost($post)
    {

    }

    public function editPost($post)
    {

    }

}
