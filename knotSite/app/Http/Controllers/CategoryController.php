<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;

class CategoryController extends Controller
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
        //Display all categories
        $categories = Category::all();
        return view('categories.index')->with('categories', $categories);
        //UI to create categories
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate Data
        $this->validate($request, [
            'name' => 'required|max:191|unique:categories,name'
        ]);
        //Store Data
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        Session::flash('success', 'New Category has been successfully Created!');
        //Show index
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('categories.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit')->with('category', $category);
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
        //validate
        $this->validate($request, [
            'name' => 'required|min:3|unique:categories,name,'.$id
        ]);
        //update
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->save();
        //flash Message
        Session::flash('success', 'Changes to Category has been successfully saved');
        //redirect
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $posts = $category->posts;
        foreach($posts as $post){
            $post->category_id = NULL;
            $post->save();
        }
        $category->delete();
        Session::flash('success', 'Category has be Successfully Deleted');
        return redirect()->route('categories.index');
    }
}
