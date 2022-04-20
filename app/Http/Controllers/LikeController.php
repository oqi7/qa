<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
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
    public function store(Request $request, Like $like)
    {
        $user = auth()->user();
        $post_id = $request->post_id;
        $is_like = $like->isLike($user->id, $post_id);

        if(!$is_like) {
            $like->storeLike($user->id, $post_id);
            return back();
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Like $like)
    {
        $user_id = $like->user_id;
        $post_id = $like->post_id;
        $like_id = $like->id;
        $is_like = $like->isLike($user_id, $post_id);

        if($is_like) {
            $like->destroyLike($like_id);
            return back();
        }
        return back();
    }
    
    // public function user_list()
    // {

    //     return $this->getUsers();

    // }

    // public function like(Post $post, Request $request){
    //     $like=New Like();
    //     $like->post_id=$post->id;
    //     $like->user_id=Auth::user()->id;
    //     $like->save();
    //     return back();
    // }
    
    // public function unlike(Post $post, Request $request){
    //     $user=Auth::user()->id;
    //     $like=Like::where('post_id', $post->id)->where('user_id', $user)->first();
    //     $like->delete();
    //     return back();
    // }
}