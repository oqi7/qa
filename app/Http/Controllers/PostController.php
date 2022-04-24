<?php

namespace App\Http\Controllers;

use App\Post;
use App\Like;
use App\Teach;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts/index')->with(['posts' => $post->get()]);  
    }
    
    public function show(Post $post)
    {
        $like=Like::where('post_id', $post->id)->where('user_id', auth()->user()->id)->first();
        return view('posts/show', compact('post', 'like'));
        
        $teach=Teach::where('post_id', $post->id)->where('user_id', auth()->user()->id)->first();
        return view('posts/show', compact('post', 'teach'));
    }
    
    public function edit(Post $post)
    {
        return view('posts/edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
    
        $post->fill($input_post)->save();
    
        return redirect('/posts/' . $post->id);
    }
    
    public function create(Request $request, Post $post)
    {
        $user = auth()->user();

        return view('posts.create', [
            'user' => $user
        ]);
    }
    
    public function store(Request $request, Post $post)
    {
        $user = auth()->user();
        $input = $request['post'];
        $post->user_id = $user->id;
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
    
    public function getUserTimeLine(Int $user_id)
    {
        return $this->where('user_id', $user_id)->orderBy('created_at', 'DESC')->paginate(50);
    }

    public function getPostCount(Int $user_id)
    {
        return $this->where('user_id', $user_id)->count();
    }
    
    public function search(Post $post)
    {
        return view('posts/search')->with(['post' => $post]);
    }
}
