<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; //Access model Post
use Session;

class PostsController extends Controller
{
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
        return view('posts.create');
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
            'title' => 'required|unique:posts|max:191', //title is required and should be les than 191 char
            'body' => 'required'//Body is required
        ]);

        //Flash message for success
        Session::flash('success', 'Your post has been successfully saved!');

        //Store data
        $post = new Post; //Creating an object of model Post
        $post->title = $request->title; //storing title
        $post->body = $request->body; //storing body
        $post->save(); //Saving the stored data
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
        //Display data in view
        return view('posts.edit')->with('post', $post);
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
            'title' => 'required|unique:posts|max:191',
            'body' => 'required'
        ]);

        Session::flash('success','Your post has been updated');
        //change data in database
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

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

        //Delete data
        $post->delete();
        //Success flash session
        Session::flash('success', 'The Post was Successfully Deleted!');
        //redirect
        return redirect()->route('posts.index');
    }
}
