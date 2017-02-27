<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; //Access model Post
use App\category; //Access model Category
use App\Tag;
use Session;

class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //pull data and store in variable
        $posts = Post::orderby('id', 'desc')->paginate(10);
        //Put data into the view
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all(); //To display categories
        return view('posts.create')->with('categories', $categories)->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate data
        $this->validate($request, [
            'title' => 'required|max:191|unique:posts,title', //title is required and should be les than 191 char
            'slug' => 'required|max:191|min:5|alpha_dash|unique:posts,slug',
            'category_id' => 'required|integer',
            'tags' => 'required',
            'body' => 'required'//Body is required
        ]);

        //Flash message for success
        Session::flash('success', 'Your post has been successfully saved!');

        //Store data
        $post = new Post; //Creating an object of model Post
        $post->title = $request->title; //storing title
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = $request->body; //storing body
        $post->save(); //Saving the stored data
        //After saving the post we work on associating it with tags
        $post->tag()->sync($request->tags, false);//False is super important
        //Display
        return redirect()->route('posts.show', $post->id); //Redirects to a page with url posts/{post id}
    }

    /**
         * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Pull data
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        $CatArray = array();
        $TagArray = array();
        //Creating an associative array for the form builder
        foreach ($categories as $category) {
            $CatArray[$category->id] = $category->name;
        }
        foreach ($tags as $tag){
            $TagArray[$tag->id] = $tag->name;
        }
        $tagsForThisPost = json_encode($post->tag->pluck('id'));
        //Display data in view
        return view('posts.edit')->with('post', $post)->with('categories', $CatArray)->with('tags', $TagArray)->with('tagsForThisPost', $tagsForThisPost);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        ///Take data from view
        $post = Post::find($id);
        //Validate data
        $this->validate($request, [
            'title' => 'required|max:191|unique:posts,title,'.$id,
            'slug' => 'required|min:5|max:255|alpha_dash|unique:posts,slug,'.$id, ///$id makes
            'category_id' => 'integer',
            'tags' => 'required',
            'body' => 'required'
        ]);

        Session::flash('success','Your post has been updated');
        //change data in database
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = $request->input('body');
        $post->save();
        $post->tag()->sync($request->tags, true);
        //Redirect
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Take data from view page
        $post = Post::find($id);
        //Removes rows which contain posts from pivot table
        $post->tag()->detach();
        //Delete data
        $post->delete();
        //Success flash session
        Session::flash('success', 'The Post was Successfully Deleted!');
        //redirect
        return redirect()->route('posts.index');
    }
}
