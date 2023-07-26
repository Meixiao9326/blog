<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\postrequest;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('Posts.index')->with(['posts' => $post->getPaginateByLimit(5)]);

    }
    
    public function show(Post $post)
{
    return view('Posts.show')->with(['post' => $post]);
    }


    public function create()
    {
        return view('Posts.create');
    }
    
    
    public function store(postrequest $request, Post $post)
{
    $input = $request['post'];
    $post->fill($input)->save();
    return redirect('/posts/' . $post->id );

}

   
}
