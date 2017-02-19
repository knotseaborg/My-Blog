<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function getIndex(){
        $posts = Post::paginate(10);
        return view('blog.index')->with('posts', $posts);
    }

    public function getSingle($slug){
        //Find the row with passed slug
        $post = Post::where('slug', '=', $slug)->first();
        //Output the view with the post
        return view('blog.single')->with('post', $post);
    }
}
