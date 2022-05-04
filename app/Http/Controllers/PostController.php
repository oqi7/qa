<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Like;
use App\Teach;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index(Post $post)
    {
        
        return view('posts/index')
        ->with(['posts' => $post->orderBy('created_at', 'DESC')->get()]);
    }
    
    public function show(Post $post)
    {
        $like=Like::where('post_id', $post->id)->get();
        $teach=Teach::where('post_id', $post->id)->get();
        return view('posts/show', compact('post', 'like', 'teach'));
    }
    
    public function edit(Post $post)
    {
        $user = auth()->user();
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
            'user' => $user,
            'post' => $post
        ]);
    }
    
    public function store(PostRequest $request, Post $post)
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
        return $this->where('user_id', $user_id)->orderBy('created_at', 'DESC')->paginate(30);
    }

    public function getPostCount(Int $user_id)
    {
        return $this->where('user_id', $user_id)->count();
    }
    
    public static function search(Post $post, Request $request)
    {
        $keyword_title = $request->title;
        $keyword_body = $request->body;
        
        if(!empty($keyword_title) && empty($keyword_body)) {
            $query = Pst::query();
            $posts = $query->where('title','like', '%' .$keyword_name. '%')->get();
            $message = "「". $keyword_title."」を含む名前の検索が完了しました。";
            return view('/search')->with([
                'posts' => $posts,
                'message' => $message,
            ]);
        }
        else {
          $message = "検索結果はありません。";
          return view('posts/search')->with('message',$message);
         }
        
        return view('/posts/search')->with(['post' => $post]);
        
    }
    
    public function teaches($id)
    {
        $teach=Teach::where('post_id', $id)->get();
        return view('posts/teach')->with(['teaches' => $teach]);
        
        $users = DB::table('users')
            ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
            ->get();
    }
    
}
