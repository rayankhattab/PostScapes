<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'destroy']);
    }
    public function index (){
        //output the posts posted 
        // $posts = Post::get();
        //the get method is from laravel collection and it displays allllll posts, 
        //now to output a certain number of posts instead of ending up with 100s on the same page we will use paginate
        $posts = Post::latest()->with(['user','likes'])->simplePaginate(10);
        // $likeToggle = 0;
        return view('posts.index', [
            'posts'=> $posts// all the posts should get sent down to post index view
        ]);
        //return view('posts.index', compact('likeToggle','posts'));

        // return view('posts.likes' , compact('likeToggle'));
    }
    public function show(Post $post) {
        return view('posts.show', [
            'post'=> $post
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'body' => 'required'
        ]);
        // Post::create([
        //     'user_id' => auth()->id(),
        //     'body' => $request->body
        // ]);
        //we can also use the request object to grap the authenticated user
        // auth()->user()->posts()->create([
        //     'body' => $request->body
        // ]);
        $request->user()->posts()->create(
            $request->only('body'));
        return back();
    }
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return back();
    }
}