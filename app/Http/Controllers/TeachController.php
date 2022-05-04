<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Teach;


class TeachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Teach $teach, User $user)
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
    public function store(Request $request, Teach $teach)
    {
        $user = auth()->user();
        $post_id = $request->post_id;
        $is_teach = $teach->isTeach($user->id, $post_id);

        if(!$is_teach) {
            $teach->storeTeach($user->id, $post_id);
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
    public function update(Request $request, Teach $teach)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teach $teach)
    {
        $user_id = $teach->user_id;
        $post_id = $teach->post_id;
        $teach_id = $teach->id;
        $is_teach = $teach->isTeach($user_id, $post_id);

        if($is_teach) {
            $teach->destroyTeach($teach_id);
            return back();
        }
        return back();
    }
    
    public function user_list()
    {

         return $this->getUsers();

    }
}
